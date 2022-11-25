<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\RaidTax;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Index
    public function index()
    {
        $users = User::all();
        $news = News::all();
        $raid_tactics = RaidTax::all();

        $context = [
            'users' => $users,
            'news' => $news,
            'raid_tactics' => $raid_tactics,
        ];

        return view('admin.index-admin', $context);
    }
}
