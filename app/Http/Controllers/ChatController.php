<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
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

    public function showChatList(Request $request)
    {
        $user = Auth::user();

        /**
         * ログインユーザーとマッチしたユーザーのみ取得
         * trainerとtraineeそれぞれの場合で分ける
         */
        $trainerData = DB::table(self::getTableName())->join('matchings as m1', 'm1.trainer_id', '=', 'users.id')
                             ->where('m1.trainer_id', $user->id)
                             ->orderBy('m1.created_at', 'asc')
                             ->get();

        // dd($trainerData);
        $traineeData = DB::table(self::getTableName())->join('matchings as m2', 'm2.trainee_id', '=', 'users.id')
                             ->where('m2.trainee_id', $user->id)
                             ->orderBy('m2.created_at', 'asc')
                             ->get();

        // 両方の場合のチャットを合わせてorder byして表示する
        $users = $trainerData->merge($traineeData);
        return View::make('chat.chat_user_select' , [
            'users' => $users
        ]);
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

    public static function getTableName(): string
    {
        return self::TABLE_NAME;
    }

    const TABLE_NAME = 'users';
}



