<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repository\Partner;
use App\Http\Requests\Partner\ShowDetailRequest;




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

    public function showPartnerDetail(ShowDetailRequest $request)
    {
        return View::make('layouts.partner.list', [
            'partners' => $partners,
        ]);
    }
}



