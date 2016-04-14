<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClaimController extends Controller
{
    /**
     * index action - list all current claims
     */
    public function index() {
        $claims = \App\Claim::orderBy('id','asc')->get();
        return json_encode($claims);
    }
}
