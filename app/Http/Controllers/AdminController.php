<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Connect;
use App\Models\Hobby;
use App\Models\Message;
use App\Models\Report;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserRole;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ReturnTypeWillChange;
use Str;
use function PHPUnit\Framework\returnArgument;

class AdminController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        $page = $request->query('page') ?? 1;
        // dd($page);
        $total_user = DB::table('user')->count('user_id');
        $total_user_in_7days = DB::table('user')->whereRaw('create_at >= NOW() - INTERVAL 7 DAY')->count('user_id');
        $total_user_active = DB::table('user')->where('ban', '=', '0')->count('user_id');
        $total_page = ceil(DB::table('user as u')->count('u.user_id') / 10);
        $users = DB::table('user as u')->leftJoin('user_role as ur', 'u.user_id', '=', 'ur.user_id')->leftJoin('role as r', 'r.role_id', '=', 'ur.role_id')->select(['u.*', 'r.*'])->orderByDesc('u.create_at')->offset(10 * ($page - 1))->limit(10)->get();
        return view('admin.qladmin', ['users' => $users, 'page' => $page, 'total_page' => $total_page, 'total_user' => $total_user, 'total_user_in_7days' => $total_user_in_7days, 'total_user_active' => $total_user_active]);
    }
    public function reports(Request $request)
    {
        $page = $request->query('page') ?? 1;
        $total_page = ceil(DB::table('report as r')->count('r.report_id') / 10);
        $total_report = DB::table('report')->count('report_id');
        $total_pending = DB::table('report as r')->where('r.status', '=', 'pending')->count('r.report_id');
        $total_done = DB::table('report as r')->where('r.status', '=', 'done')->count('r.report_id');
        $total_done_today = DB::table('report as r')->where('r.status', '=', 'done')->whereRaw('DATE(r.create_at) = CURDATE()')->count('r.report_id');
        $total_reject = DB::table('report as r')->where('r.status', '=', 'reject')->count('r.report_id');
        $reports = DB::table('user as u')->join('report as r', 'u.user_id', '=', 'r.user_been_reported_id')->join('user as u1', 'r.user_create_id', '=', 'u1.user_id')->select(['u.user_name', 'u.user_id', 'u.user_image', 'r.*', 'r.create_at as date_report', 'u1.user_name as user_created_name'])->orderByDesc('r.create_at')->limit(10)->get();
        return view('admin.report_manager', ['page' => $page, 'total_page' => $total_page, 'reports' => $reports, 'total_report' => $total_report, 'total_pending' => $total_pending, 'total_done' => $total_done, 'total_reject' => $total_reject, 'total_done_today' => $total_done_today]);
    }
    public function add_user_get()
    {
        $roles = Role::get();
        return view('admin.add_new_user', ['roles' => $roles]);
    }
    public function add_user_post(Request $request)
    {
        $request->validate([
            "email" => 'required|string',
            "user_name" => 'required|string',
            'user_address' => 'required|string|max:100',
            "user_gender" => "required",
            "year_of_birth" => "required|integer|lte:" . (date('Y') - 18),
            "height" => "required|decimal:0,2|lte:215|gt:140",
            "user_image" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
            "slogan" => "max:80",
            'role_id' => 'required|string'
        ]);
        $path = "";
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $file_name = substr(Str::uuid(), 0, 8) . "-" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $file_name, 'public');
            storage_path('app/public/images/' . $path);
        }
        $role = Role::where('role_id', '=', $request['role_id'])->first();
        $exist_user = User::where('email', '=', $request['email'])->orWhere('user_name', '=', $request['user_name'])->first();
        if ($exist_user != null) {
            return back()->withInput()->with(['message' => 'username hoặc email đã tồn tại', 'alert-type' => 'error']);
        }
        $user = User::create([
            "user_id" => Str::uuid(),
            "email" => $request['email'],
            "user_name" => $request['user_name'],
            'user_address' => $request['user_address'],
            'user_gender' => $request['user_gender'],
            'year_of_birth' => $request['year_of_birth'],
            'height' => $request['height'] / 100,
            'slogan' => $request['slogan'],
            'user_image' => $request['user_image'] ?? '',
            'password' => Hash::make('123456789')
        ]);
        // dd($user);
        UserRole::insert([
            'user_id' => $user->user_id,
            'role_id' => $role->role_id
        ]);
        Connect::insert([
            'user_id' => $user->user_id,
            'connect_quantity' => 0
        ]);
        Hobby::insert([
            'hobbies_id' => Str::uuid(),
            'hobbies_name' => '',
            'user_id' => $user->user_id
        ]);
        return redirect(route('add_user.get'))->with(['message' => 'Thêm mới user thành công', 'alert-type' => 'success']);
    }

    public function review_report(Request $request)
    {
        // dd($request);
        $report_id = $request['report_id'];
        // dd($report_id);
        $test = Report::where('report_id', '=', $report_id)->first();
        if ($test === null) {
            return redirect(route('reports.get'))->with(['message' => 'Có lỗi xảy ra: Không tìm thấy (NULL)', 'alert-type' => 'error']);
        }
        try {
            $report = DB::table('user as u')->join('report as r', 'u.user_id', '=', 'r.user_been_reported_id')
                ->join('user as u1', 'r.user_create_id', '=', 'u1.user_id')
                ->select(['u.user_name', 'u.user_id', 'u.user_image', 'u.report_time', 'r.*', 'r.create_at as date_report', 'u1.user_name as user_created_name', 'u1.user_image as user_created_image', 'u1.user_id as user_created_id'])
                ->where('r.report_id', '=', $report_id)->first();
            return view('admin.review_report', ["report" => $report]);
        } catch (\Exception $th) {
            //throw $th;
            return redirect(route('reports.get'))->with(['message' => 'Có lỗi xảy ra: ' . $th->getMessage(), 'alert-type' => 'error']);
        }
    }
    public function ban_user_in_report(Request $request)
    {
        try {
            // dd($request);
            $request->validate([
                "user_id" => "required|string",
                "report_id" => "required|string"
            ]);
            User::where('user_id', '=', $request['user_id'])->update(['ban' => 1]);
            return redirect(route('review_report.get', ['report_id' => $request['report_id']]))->with(['message' => 'Ban thành công', 'alert-type' => "success"]);
        } catch (\Exception $th) {
            //throw $th;
            return redirect(route('review_report.get', ['report_id' => $request['report_id']]))->with(['message' => 'Xảy ra lỗi' . $th->getMessage(), 'alert-type' => "error"]);
        }
    }
    public function submit_report(Request $request)
    {
        // dd($request);
        $request->validate([
            "report_id" => "required|string",
            "status" => "required|string"
        ]);
        try {
            //code...
            Report::where('report_id', '=', $request['report_id'])->update(['status' => $request['status'], 'note' => $request['note']]);
            return redirect(route('review_report.get', ['report_id' => $request['report_id']]))->with(['message' => 'Cập nhật report thành công', 'alert-type' => "success"]);
        } catch (\Exception $th) {
            //throw $th;
            return redirect(route('review_report.get', ['report_id' => $request['report_id']]))->with(['message' => 'Xảy ra lỗi' . $th->getMessage(), 'alert-type' => "error"]);
        }
    }
    public function detail_user(Request $request, $user_id)
    {
        //  user/{user_id} ===> cannot get $require parameter like this use directly like this $user_id
        // $request->validate([
        //     "user_id" => "required|string"
        // ]);
        $user_id = $request['user_id'];
        // dd($user_id);
        $test1 = User::where('user_id', '=', $user_id)->first();
        $test2 = Connect::where('user_id', '=', $user_id)->first();
        if ($test1 === null || $test2 === null) {
            return redirect(route('dashboard.get'))->with(['message' => 'Có lỗi xảy ra: Không tìm thấy (NULL)', 'alert-type' => 'error']);
        }
        try {
            $user = DB::table('user as u')->join('user_role as ur', 'ur.user_id', '=', 'u.user_id')->join('hobbies as h', 'h.user_id', '=', 'u.user_id')->join('connect as c', 'c.user_id', '=', 'u.user_id')
                ->join('amount_connect as ac', 'ac.user_id', '=', 'u.user_id')->where('u.user_id', '=', $user_id)->select(['u.*', 'ur.role_id', 'h.hobbies_name', 'c.connect_quantity', 'ac.amount as amount_connect'])->first();
            $dates = DB::select("
            select d.*,u1.user_name as user1_name,u1.user_image as user1_image,u2.user_name as user2_name,u2.user_image as user2_image from dates d join user u1 on u1.user_id = d.user1_id join user u2 on u2.user_id = d.user2_id 
            where d.user1_id = :user1_id or d.user2_id = :user2_id
        ", ['user1_id' => $user_id, 'user2_id' => $user_id]);
            $reports = DB::select("
            select * from report r
            where r.user_create_id = :user1_id or r.user_been_reported_id = :user2_id
        ", ['user1_id' => $user_id, 'user2_id' => $user_id]);
            $transactions = Transaction::where('user_id', '=', $user_id)->get();
            $roles = Role::all();
            return view('admin.detail_user', ['user' => $user, 'dates' => $dates, 'reports' => $reports, 'roles' => $roles, 'transactions' => $transactions]);
        } catch (\Exception $th) {
            return redirect(route('dashboard.get'))->with(['message' => 'Có lỗi xảy ra: ' . $th->getMessage(), 'alert-type' => 'error']);
        }
    }

    public function update_detail_user(Request $request)
    {
        // dd($request);
        $request->validate([
            "user_id" => "required|string",
            "status" => "required|string",
            "role_id" => "required|string"
        ]);
        try {
            User::where('user_id', '=', $request['user_id'])->update(["ban" => ($request['status'] == 'active' ? 0 : 1)]);
            UserRole::where('user_id', '=', $request['user_id'])->update(['role_id' => $request['role_id']]);
            return redirect(route('detail_user.get', ['user_id' => $request['user_id']]))->with(['message' => 'Cập nhật thành công', 'alert-type' => "success"]);
        } catch (\Exception $th) {
            return redirect(route('detail_user.get', ['user_id' => $request['user_id']]))->with(['message' => 'Xảy ra lỗi: ' . $th->getMessage(), 'alert-type' => "error"]);
        }
    }

    public function chats(Request $request)
    {
        $page = $request->query('page') ?? 1;
        $user_id = $request->query('user_id') ?? null;
        $users = DB::table("user as u")->select('u.user_id', "u.user_name", "u.create_at", "u.email", "u.user_image", "u.ban")->offset(10 * ($page - 1))->limit(10)->get();
        $chats = null;
        $total_page = ceil(User::count("user_id") / 10);
        if ($user_id != null) {
            $chats = DB::table("chat as c")->join("user as u1", 'c.user1_id', "=", "u1.user_id")->join("user as u2", 'c.user2_id', "=", "u2.user_id")
                ->where('c.user1_id', '=', $user_id)->orWhere("c.user2_id", "=", $user_id)
                ->select(["c.*", "u1.user_id as user1_id", "u1.user_name as user1_name", "u1.user_image as user1_image", "u2.user_id as user2_id", "u2.user_name as user2_name", "u2.user_image as user2_image"])->get();
        }
        return view('admin.chat_manage', ["page" => $page, 'chats' => $chats, 'user_id' => $user_id, "users" => $users, "total_page" => $total_page]);
    }

    public function chat_message(Request $request)
    {
        $chat_id = $request['chat_id'];
        $test1 = Chat::where('chat_id', '=', $chat_id)->first();
        if ($test1 === null) {
            return back()->with(['message' => 'Có lỗi xảy ra: Không tìm thấy (NULL)', 'alert-type' => 'error']);
        }
        $chats = DB::table("chat as c")->join("user as u1", 'c.user1_id', "=", "u1.user_id")->join("user as u2", 'c.user2_id', "=", "u2.user_id")
            ->where("c.chat_id", '=', $chat_id)
            ->select(["c.*", "u1.user_id as user1_id", "u1.user_name as user1_name", "u1.user_image as user1_image", "u2.user_id as user2_id", "u2.user_name as user2_name", "u2.user_image as user2_image"])->first();
        // dd($chats);
        $user_id_view = $request->query("user_id_view") ?? $chats->user1_id;
        $messages = DB::table("message as m")->where('m.chat_id', "=", $chat_id)->select([
            "m.*"
        ])->orderBy('m.create_at', 'asc')->get();
        //bad performance
        $total_message = Message::where('chat_id', '=', $chat_id)->count();
        return view('admin.chat_message', ["chats" => $chats, "messages" => $messages, "user_id_view" => $user_id_view,"total_message"=>$total_message]);
    }
}
