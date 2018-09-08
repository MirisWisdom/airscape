<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Search;

class SearchController extends Controller
{
    public function store(Request $request){

    	$user = \Auth::user();

    	$s = new Search();
    	$s->user_id = ($user) ? $user->id : null;
    	$s->guest_id = null;
    	$s->location = $request->location;
    	$s->save();

    	$results = null;

    	return $results;

    }
}
