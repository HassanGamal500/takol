<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(Request $request){
        $request->session()->put('id', $request->input('id'));
        return view('QR/order')->with('id', $request->session()->get('id'));
    }
}
