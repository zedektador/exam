<?php

namespace App\Version2\Http\Controllers;


use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function view()
    {
        return response()->json(['version' => '2']);
    }
}