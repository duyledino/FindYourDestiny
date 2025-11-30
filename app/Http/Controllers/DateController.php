<?php

namespace App\Http\Controllers;

use App\Mail\NotificationConnectMail;
use App\Models\Chat;
use App\Models\Connect;
use App\Models\Date;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Str;

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
        Mail::to($users[1]->email)->send(new NotificationConnectMail($users[1]));
        return redirect(route('user.detail', ["user_id" => $request->user_id_be_connected]))->with(['message' => 'Kết nối thành công hãy nhắn tin nào', 'alert-type' => 'success']);
    }
}
