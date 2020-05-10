<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $user = Auth::user();
        $loginID = $user->id;

        $partnerID = intval($request->route('id'));
        $comments = DB::table('comments')->where('login_id', '=' , $loginID)->where('partner_id', '=', $partnerID)->get();

        return view('chat.chat_room', [
            'comments' => $comments,
            'partnerID' => $partnerID,
            'loginID' => $loginID
        ]);
    }

    //store comment records
    public function addComment (Request $request)
    {
        $user = Auth::user();
        $loginID= $user->id;
        $comment = $request->input('comment');
        $partnerID = $request->input('partner_id');

        $request->validate([
            'comment' => 'required|max:256'
        ]);

        Comment::create([
            'login_id' => $loginID,
            'partner_id' => $partnerID,
            'name' => $user->nickname,
            'comment' => $comment
        ]);

        return redirect()-> action('ChatController@showChatRoom', $partnerID);
    }

    public function getData(Request $request){
        $loginID = $request->input('login_id');
        $partnerID = $request->input('partner_id');
        $comments = Comment::orderBy('created_at', 'desc')->where('login_id', '=' , $loginID)->where('partner_id', '=', $partnerID)->get();
        $json = ["comments" => $comments];
        return response()->json($json);
    }
}



