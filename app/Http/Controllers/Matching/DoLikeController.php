<?php

namespace App\Http\Controllers\Matching;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Matching\DoLikeRequest;
use App\Business\Matching\CreateReactionService;
use App\Repository\Enum\ReactionEnum;


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
        $loginUserID = Auth::user()->id;
        $toUserID = $request->getToUserID();
        $reactionStatus = ReactionEnum::LIKE;
        $createReaction = new CreateReactionService;
        $createReaction->doCreate($loginUserID, $toUserID, $reactionStatus);
    }

    const TABLE_NAME = 'users';
}



