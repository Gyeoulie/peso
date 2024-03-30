<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FillProfileController extends Controller
{

    public function index(){
        return view('fill.test');
    }


    public function store(Request $request){
        dd($request->all());
    }
    //
}
