<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searches = Auth::check()
            ? Search::where('user_id', Auth::id())->get()
            : [];

        return view('welcome', [
            'searches' => $searches
        ]);
    }
}
