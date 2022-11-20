<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecController extends Controller
{
    //Admin index view
    public function index()
    {
        return view('admin.recruitment.spec.index-spec');
    }
}
