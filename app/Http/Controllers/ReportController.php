<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Str;

class ReportController extends Controller
{
    //
    public function report(Request $request)
    {
        // dd($request);
        $request->validate([
            "user_been_reported_id" => "required|string",
            "report_name" => "required|string",
            "create_at" => "required|string",
            "content" => "required|string",
            "user_been_reported_name" => "required|string",
            "report_image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
        ]);
        // dd($request);
        try {
            $path = '';
            if ($request->hasFile('report_image')) {
                $file = $request->file('report_image');
                $fileName = substr(Str::uuid(), 0, 8) . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');
                storage_path('app/public/images/' . $path);
            }
            // dd($path);
            Report::create([
                "report_id" => Str::uuid(),
                "report_name" => $request['report_name'],
                'user_create_id' => auth()->user()->user_id,
                "user_been_reported_id" => $request['user_been_reported_id'],
                "create_at" => $request['create_at'],
                "content" => $request['content'],
                "user_been_reported_name" => $request['user_been_reported_name'],
                "status" => "pending", // pending, done, reject
                "report_image"=>$path
            ]);
            User::where("user_id", '=', $request['user_been_reported_id'])->increment('report_time', 1);
        } catch (\Exception $e) {
            //throw $th;
            return back()->with(['message' => 'Có lỗi khi thực hiện thao tác này' . '<br>' . $e->getMessage(), 'alert-type' => 'error']);
        }

        return redirect(route('message.get'))->with(['message' => 'Report thành công ' . $request['user_been_reported_name'], 'alert-type' => 'success']);
    }
}
