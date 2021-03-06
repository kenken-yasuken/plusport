<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repository\Partner;
use App\Http\Requests\Partner\PartnerListRequest;


class SearchController extends Controller
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

    public function showPartnerList(PartnerListRequest $request)
    {
        $loginUser = Auth::user();
        $partner = new Partner;
        $partners = $partner->getTargets($loginUser->id);

        return View::make('partner.list', [
            'partners' => $partners,
        ]);
    }
}



