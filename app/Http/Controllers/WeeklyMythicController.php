<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use App\Models\WeeklyMythic;
use Illuminate\Http\Request;

class WeeklyMythicController extends Controller
{
    public function index()
    {
        $limits = WeeklyMythic::all();

        return view('admin.attendance.index-weekly', ['limits' => $limits]);
    }

    public function create()
    {
        return view('admin.attendance.create-weekly');
    }

    public function store()
    {
        request()->validate([
            'prev_week' => 'integer',
            'current_week' => 'integer',
        ]);

        $weekly_limits = new WeeklyMythic;
        $weekly_limits->prev_week = request('prev_week');
        $weekly_limits->current_week = request('current_week');
        $weekly_limits->save();

        Toastr::success('Weekly Limit added succesfully!', 'System message');

        return redirect(route('weeklymythic.index'));
    }

    public function edit(WeeklyMythic $weeklyMythic)
    {
        return view('admin.attendance.edit-weekly', ['weeklyMythic' => $weeklyMythic]);
    }

    public function update(WeeklyMythic $weeklyMythic)
    {
        request()->validate([
            'prev_week' => 'integer',
            'current_week' => 'integer',
        ]);

        $weeklyMythic->prev_week = request('prev_week');
        $weeklyMythic->current_week = request('current_week');
        $weeklyMythic->save();

        Toastr::success('Weekly Limit updated succesfully!', 'System message');

        return redirect(route('weeklymythic.index'));
    }

    public function destroy(WeeklyMythic $weeklyMythic)
    {
        $weeklyMythic->delete();

        Toastr::success('Weekly Limit deleted succesfully!', 'System message');

        return redirect(route('weeklymythic.index'));
    }
}

