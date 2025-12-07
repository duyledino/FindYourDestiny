<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestFilter;
use App\Mail\NotificationConnectMail;
use App\Models\Chat;
use App\Models\Connect;
use App\Models\Date;
use App\Models\Transaction;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Str;
use function PHPUnit\Framework\isNumeric;

class DateController extends Controller
{
    //
    public function connect(Request $request)
    {
        // dd($request);
        $request->validate([
            "user_id_connect" => "required|string",
            "user_id_be_connected" => "required|string",
            "amount_to_connect" => "required|decimal:0,2"
        ]);
        $connect = Connect::where('user_id', '=', $request->user_id_connect)->get();
        if ($connect[0]) {
            // dd($connect[0]);
            $user_connect = $connect[0];
            if ($request->amount_to_connect < $user_connect->connect_quantity) {
                $transaction = Transaction::create([
                    'transaction_id' => Str::uuid(),
                    'amount' => $request->amount_to_connect,
                    'user_id' => $request->user_id_connect,
                    'amount_from' => $user_connect->connect_quantity,
                    'amount_to' => $user_connect->connect_quantity - $request->amount_to_connect

                ]);
                $connect = Connect::where('user_id', '=', $user_connect->user_id)->update([
                    "connect_quantity" => $user_connect->connect_quantity - $request->amount_to_connect
                ]);
            } else {
                $notification = array(
                    'message' => 'Không đủ connect để thực hiện kết nối',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        }

        $date = Date::create(
            [
                "date_id" => Str::uuid(),
                "user1_id" => $request->user_id_connect,
                "user2_id" => $request->user_id_be_connected,
                "amount_to_connect" => $request->amount_to_connect
            ]
        );
        // dd($date);
        $chat = Chat::create([
            "chat_id" => Str::uuid(),
            "user1_id" => $request->user_id_connect,
            "user2_id" => $request->user_id_be_connected,
        ]);

        $users = User::findMany([$request->user_id_connect, $request->user_id_be_connected], ['user_name', 'email'])->all();
        Mail::to($users[1]->email)->send(new NotificationConnectMail($users[0]));
        return redirect(route('user.detail', ["user_id" => $request->user_id_be_connected]))->with(['message' => 'Kết nối thành công hãy nhắn tin nào', 'alert-type' => 'success']);
    }

    public function connectPage(Request $request)
    {
        $current_page= is_numeric($request->query('current_page')) ? $request->query('current_page') : 1 ;
        $offset = $current_page <= 1 ? 0 : ($current_page - 1) * 10;
        $users = DB::select("
SELECT 
    u.user_id,
    u.user_name,
    u.user_gender,
    u.year_of_birth,
    u.ban,
    u.user_image,
    h.hobbies_name,
    COUNT(d.user2_id) AS total_dates
FROM user u
JOIN hobbies h 
    ON u.user_id = h.user_id
LEFT JOIN dates d 
    ON u.user_id = d.user2_id
WHERE 
    u.year_of_birth BETWEEN 1975 AND 2007
    AND h.hobbies_name like '%%'
    AND (u.user_gender = 'Male' OR u.user_gender = 'Female')
GROUP BY 
    u.user_id,
    u.user_name,
    u.user_gender,
    u.year_of_birth,
    u.ban,
    u.user_image,
    h.hobbies_name
ORDER BY 
    total_dates DESC
LIMIT 10 OFFSET $offset ;
");
        $all_user = DB::table('user as u')
    ->join('hobbies as h', 'u.user_id', '=', 'h.user_id')
    ->leftJoin('dates as d', 'u.user_id', '=', 'd.user2_id')
    ->whereBetween('u.year_of_birth', [1975, 2004])
    ->where('h.hobbies_name', 'LIKE', '%%')
    ->whereIn('u.user_gender', ['Male', 'Female'])
    ->distinct() // tránh trùng do join
    ->count('u.user_id');
        // dd($all_user);
        // $total_page = ;
        return view("connect.Connect", ["users" => $users, "age_from" => 18, "age_to" => 35, 'hobbies' => "", "user_gender" => "All","current_page"=>$current_page,"total_page"=>ceil($all_user/10)]);
    }

    public function filter(RequestFilter $request)
    {
        // dd($request);
        $hobbies = explode(',', $request['hobbies']);
        if (count($hobbies) > 3) {
            return back()->with(['message', 'Sở thích không được vượt quá 3 sở thích']);
        }
        $gender = $request['user_gender'];
        $year_to = date('Y') - $request['age_from'];
        $year_from = date('Y') - $request['age_to'];
        $page = $request['page'];
        $queryHobbies = '';
        foreach ($hobbies as $index => $value) {
            if ($index < count($hobbies) - 1) {
                $queryHobbies .= "h.hobbies_name like '%{$value}%' or";
            } else {
                $queryHobbies .= "h.hobbies_name like '%{$value}%'";
            }
        }

        $genderCondition = ($gender === 'All')
            ? "(u.user_gender = 'Male' OR u.user_gender = 'Female')"
            : "u.user_gender = '{$gender}'";

        $offset = ($page > 1) ? ($page - 1) * 10 : 0;

        // Final query
        $sql = "

SELECT 
    u.user_id,
    u.user_name,
    u.user_gender,
    u.year_of_birth,
    u.ban,
    u.user_image,
    h.hobbies_name,
    COUNT(d.user2_id) AS total_dates
FROM user u
JOIN hobbies h 
    ON u.user_id = h.user_id
LEFT JOIN dates d 
    ON u.user_id = d.user2_id
WHERE 
    u.year_of_birth BETWEEN {$year_from} AND {$year_to}
    AND ({$queryHobbies})
    AND {$genderCondition}
GROUP BY 
    u.user_id,
    u.user_name,
    u.user_gender,
    u.year_of_birth,
    u.ban,
    u.user_image,
    h.hobbies_name
ORDER BY 
    total_dates DESC
LIMIT 10 offset {$offset};
";
$all_user = DB::table('user as u')
    ->join('hobbies as h', 'u.user_id', '=', 'h.user_id')
    ->leftJoin('dates as d', 'u.user_id', '=', 'd.user2_id')
    ->whereBetween('u.year_of_birth', [$year_from, $year_to])
    ->whereRaw($queryHobbies)
    ->whereIn('u.user_gender', ['Male', 'Female'])
    ->distinct() // tránh trùng do join
    ->count('u.user_id');
        $users = DB::select($sql);
        // dd($all_user);
        return view('connect.filterConnectPage', ["users" => $users, "age_from" => (date('Y') - $year_to), "age_to" => (date('Y') - $year_from), 'hobbies' => $request['hobbies'], "user_gender" => $gender,"current_page"=>$page,"total_page"=>ceil($all_user/10)]);
    }
}
