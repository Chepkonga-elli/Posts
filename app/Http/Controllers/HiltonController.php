<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HiltonController extends Controller
{
    function hiltonIndex()
    {
        return view('hilton');
    }
}
