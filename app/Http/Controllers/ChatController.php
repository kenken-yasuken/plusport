<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
// use App\User;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Foundation\Console\Presets\React;
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

    public function showChatRoom(Request $request)
    {
        // $user = Auth::user();
        $comments = Comment::get();
        $partnerID = $request->route('id');
        var_dump('Start partnerID');
        var_dump($partnerID);

        return view('chat_room', [
            'comments' => $comments,
            'partnerID' => $partnerID
        ]);
    }

    //store comment records
    public function addComment (Request $request)
    {
        var_dump('Start addComment');
        $user = Auth::user();
        $userID= $user->id;
        $comment = $request->input('comment');
        $partnerID = $request->input('parnerID');

        print_r('### Start partnerID');
        var_dump($partnerID);

        $request->validate([
            'comment' => 'required|max:10'
        ]);
        print_r('Before redirect');
        Comment::create([
            'login_id' => $userID,
            'partner_id' => $partnerID,
            'name' => $user->name,
            'comment' => $comment
        ]);
        print_r('After create');
        return redirect()-> action('ChatController@showChatRoom', $userID);
    }

    public function getData(){
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $json = ["comments" => $comments];
        return response()->json($json);
    }
}



