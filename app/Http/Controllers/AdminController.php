<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Index
    public function index()
    {
        $users = User::all();

        $context = [
            'users' => $users,
        ];

        return view('admin.index-admin', $context);
    }
}
