<?php

namespace App\Http\Controllers\Matching;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Partner\DoLikeRequest;
use App\Business\Matching\CreateReactionService;


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
        $fromUserID = $request->getLoginUserID();
        $toUserID = $request->getToUserID();
        $createReaction = new CreateReactionService;
        $createReaction->doCreate($fromUserID, $toUserID);    }

    const TABLE_NAME = 'users';
}



