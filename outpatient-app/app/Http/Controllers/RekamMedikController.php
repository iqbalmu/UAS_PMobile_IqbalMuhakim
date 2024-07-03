<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekamMedikController extends Controller
{
    public function store(Request $request) {
        dd($request->all());
    }
}
