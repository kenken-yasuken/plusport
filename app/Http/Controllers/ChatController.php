<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
// use App\User;
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

    public function showChatRoom()
    {
        // $user = Auth::user();
        $comments = Comment::get();
        return view('chat_room', ['comments' => $comments]);
    }

    //store comment records
    public function addComment (Request $request) {
        $user = Auth::user();
        $userID= $user->id;
        $comment = $request->input('comment');

        $request->validate([
            'comment' => 'required|max:10'
        ]);

        // $validator = Validator::make($request->all(), [
        //     'comment' => 'required|max:1000'
        // ]);

        // if ( $validator->fails() ){
        //     return redirect(action('ChatController@showChatRoom', $userID))
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $comment
        ]);
        return redirect()-> action('ChatController@showChatRoom', $userID);
    }

    public function getData(){
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $json = ["comments" => $comments];
        return response()->json($json);
    }
}



