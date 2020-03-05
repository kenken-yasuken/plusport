<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
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

    /**
     * Show users who are able to chat
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //User who logged in
        $user = Auth::user();
        // Get users but who logged in
        $users = User::where('id' ,'<>' , $user->id)->get();
        // Display users who's able to send comments
        return view('chat_user_select' , compact('users'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $comment = $request->input('comment');
        Comment::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'comment' => $comment
        ]);
        return redirect()->route('home');
    }
}
