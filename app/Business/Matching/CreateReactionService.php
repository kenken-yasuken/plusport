<?php

namespace App\Business\Matching;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repository\Reaction;


class CreateReactionService
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function doCreate(string $fromUserID, string $toUserID, int $reactionStatus): bool
    {
        $reaction = new Reaction;
        if(!$reaction->create($fromUserID, $toUserID, $reactionStatus)){
            throw new \InvalidArgumentException('[#fkswe1223]: Something went wrong in create transaction');
        }
        return true;
    }
}



