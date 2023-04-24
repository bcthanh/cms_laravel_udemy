<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //

    public function index(){
        // dd(auth()->user()->userHasRole('Admin1'));
        return view('admin.index');

    }

}
