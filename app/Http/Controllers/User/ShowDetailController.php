<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repository\Partner;
use App\Http\Requests\Partner\ShowDetailRequest;
use Illuminate\Support\Facades\DB;


class ShowDetailController extends Controller
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

    public function showDetail(ShowDetailRequest $request)
    {
        $partnerID = $request->getPartnerID();
        $partner = Partner::getByID($partnerID);
        $userName = $partner->nickName;
        return View::make('partner.detail', [
            'userName' => $userName
        ]);
    }

    const TABLE_NAME = 'users';
}



