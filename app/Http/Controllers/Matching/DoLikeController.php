<?php

namespace App\Http\Controllers\Matching;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Matching\DoLikeRequest;
use App\Business\Matching\CreateReactionService;
use App\Repository\Enum\ReactionEnum;
use App\Repository\Reaction;
use App\Repository\Matching;


class DoLikeController extends Controller
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

    public function doLike(DoLikeRequest $request)
    {
        //ログインユーザー
        $fromUserID = Auth::user()->id;
        $toUserID = $request->getToUserID();
        $reactionStatus = ReactionEnum::LIKE;
        $createReaction = new CreateReactionService;
        $createReaction->doCreate($fromUserID, $toUserID, $reactionStatus);
        $sportID = 1;
        $categoryID = 1;// TODO: スポーツとカテゴリーを定義する
        //いいねのタイミングですでに同じ相手からいいねがあればマッチングさせる
        $like = Reaction::getByFromAndToID($fromUserID, $toUserID);
        if($like){
            // MEMO: マッチングした2人のユーザーをどうやってtrainerとtraineeにどう振り分けるか、決めるまで一旦固定で
            Matching::insert($fromUserID, $toUserID, $sportID, $categoryID);
            return View::make('matching.matched');
        }
        return View::make('matching.result');
    }

}



