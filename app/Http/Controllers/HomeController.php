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
        return view('chat.chat_user_select' , compact('users'));
    }
}
