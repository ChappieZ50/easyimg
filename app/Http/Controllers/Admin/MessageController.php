<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderByDesc('id')->paginate();
        return view('ipool.messages.messages')->with('messages', $messages);
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('ipool.messages.message')->with('message', $message);
    }

    public function destroy($id)
    {
        $message = Message::where('id', $id)->first();
        if ($message && $message->delete()) {
            return response()->json(['message' => __('page.admin_response_message_delete_success'), 'status' => true]);
        }

        return response()->json(['message' => __('page.response_error'), 'status' => false], 404);
    }
}
