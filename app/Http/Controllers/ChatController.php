<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChatRoom($id)
    {
        //User who logged in
        $user = Auth::user();

        // // Get users but who logged in
        // $users = User::where('id' ,'<>' , $user->id)->get();
        $comments = Comment::get();
        return view('chat_room', ['comments' => $comments]);
    }

    public function addComment (Request $request) {
        $user = Auth::user();
        $comment = $request->input('comment');
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $comment
        ]);
        return redirect()->route('chats');
    }
}
