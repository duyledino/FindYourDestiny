<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\Chat;
use App\Models\Message;
use DB;
use Illuminate\Http\Request;
use Str;

class MessageController extends Controller
{
    //
    public function chat(Request $request)
    {
        $string_query = $request->query('chat_id') ?? '';
        // dd($string_query);
        $user_id = auth()->user()->user_id;
        // dd(auth()->user()->user_id);
        $chat = DB::select("
        SELECT 
    u1.user_id      AS user1_id,
    u1.user_name    AS user1_name,
    u1.user_image  as user1_image,
    u2.user_id     as user2_id,
    u2.user_name    AS user2_name,
    u2.user_image as user2_image,
    c.chat_id,
    m.user_id as user_id_send,
    m.content,
    m.create_at as message_create_at,
    m.status as message_status
FROM user AS u1
JOIN chat AS c 
    ON c.user1_id = u1.user_id
JOIN user AS u2
    ON u2.user_id = c.user2_id
left JOIN (
    SELECT m1.chat_id, m1.content, m1.create_at, m1.status,m1.user_id
    FROM message AS m1
    WHERE m1.create_at = (
        SELECT max(m2.create_at)
        FROM message AS m2
        WHERE m2.chat_id = m1.chat_id
    )
) AS m
    ON m.chat_id = c.chat_id
WHERE c.user1_id = :user_id1 or c.user2_id = :user_id2
ORDER BY m.create_at DESC;
        ", ['user_id1'=>$user_id,'user_id2'=>$user_id]);
        // this is how I pass value to sql query :user_id, [$user_id]);
        //cons: update every load page
        // dd($chat);
        foreach($chat as $c){
            if($c->user1_id!==$user_id){
                $tempId = $c->user1_id;
                $c->user1_id = $c->user2_id;
                $c->user2_id = $tempId;
                $tempName = $c->user1_name;
                $c->user1_name = $c->user2_name;
                $c->user2_name = $tempName;
                $tempImage = $c->user1_image;
                $c->user1_image = $c->user2_image;
                $c->user2_image = $tempImage;
            }
        }
        $current_chat = null;
        // dd($chat);
        if ($string_query !== "") {
            Message::where('chat_id', '=', $string_query)->where('user_id', '!=', $user_id)->update(['status' => 'seen']);
            $current_chat = Message::where('chat_id', '=', $string_query)->orderBy('create_at', 'asc')->get(['message_id', 'user_id', 'content', 'create_at', 'status']);
            $current_chat['chat_id'] = $string_query;
        }
        // dd($current_chat);
        return view('connect.Message', ["chats" => $chat, 'current_chat' => $current_chat]);
    }

    public function send(Request $request)
    {
        // dd($request);
        $request->validate([
            "chat_id" => "required",
            "content" => "required|string"
        ]);
        $user_id = auth()->user()->user_id;
        $message = Message::create([
            "chat_id"=>$request['chat_id'],
            "message_id"=>Str::uuid(),
            "content"=>$request['content'],
            "create_at"=>now(),
            "user_id"=>$user_id,
            "status"=>"unseen"
        ]);
        broadcast(new PusherBroadcast($request['content'], $request->chat_id, $user_id,$message->create_at));
        
        return response()->json(['status'=>'sent']);
    }
}
