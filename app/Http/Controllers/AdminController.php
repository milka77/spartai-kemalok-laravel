<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\RaidTax;
use App\Models\User;
use App\Models\WeeklyMythic;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Index
    public function index()
    {
        $users = User::all();
        $news = News::all();
        $raid_tactics = RaidTax::all();

        // Get the weekly limits
        $limits = WeeklyMythic::where('id', 1)->first();
        $prev_limit = $limits->prev_week;
        $current_limit = $limits->current_week;

        $context = [
            'users' => $users,
            'news' => $news,
            'raid_tactics' => $raid_tactics,
            'prev_limit' => $prev_limit,
            'current_limit' => $current_limit,
        ];

        return view('admin.index-admin', $context);
    }
}
