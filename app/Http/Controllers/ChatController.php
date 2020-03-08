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

    public function showChatRoom(string $id)
    {
        //User who logged in
        $user = Auth::user();
        $comments = Comment::get();
        // var_dump('showChatRoom');
        return view('chat_room', ['comments' => $comments]);
    }

    //store comment records
    public function addComment (Request $request) {
        $user = Auth::user();
        $userID= $user->id;
        $comment = $request->input('comment');

        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:1000'
        ]);

        if ( $validator->fails() ){
            print_r('validator start');
            print_r('validator end');
            return redirect(action('ChatController@showChatRoom', $userID))
            ->withErrors($validator)
            ->withInput();
        }
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $comment
        ]);
        return redirect()-> action('ChatController@showChatRoom', $userID);
    }
}



