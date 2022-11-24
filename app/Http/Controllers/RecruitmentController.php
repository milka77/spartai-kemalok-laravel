<?php

namespace App\Http\Controllers;

use App\Models\PlayableClass;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class RecruitmentController extends Controller
{
    // Displaying all Recruitments for Admins
    public function adminindex()
    {
        $recruitments = Recruitment::all();

        return view('admin.recruitment.index-recruitment', ['recruitments' => $recruitments]);
    } 

    // Displaying the Recruiment Form to create new one
    public function create()
    {
        $classes = PlayableClass::orderBy('name')->get();

        return view('admin.recruitment.create-recruitment', ['classes' => $classes]);
    }

    // Storing Recruiments
    public function store()
    {
        // Data Validation
        request()->validate([
            'playable_class_id' => 'required',
            'comment' => 'required',
        ]);

        $is_active = 0;

        // Checking the 'is_active' checkbox
        if(request('is_active'))
        {
            $is_active = 1;
        }

        // Assigning values
        $rec = new Recruitment;
        $rec->user_id = auth()->user()->id;
        $rec->playable_class_id = request('playable_class_id');
        $rec->comment = request('comment');
        $rec->is_active = $is_active;
        $rec->save();

        Toastr::success('Recruitment added successfuly!', 'System message');

        return redirect(route('recruit.adminindex'));
    }

    // Show the Edit form
    public function edit(Recruitment $recruitment)
    {
        $classes = PlayableClass::orderBy('name')->get();

        $context = [
            'recruitment' => $recruitment,
            'classes' => $classes,
        ];

        return view('admin.recruitment.edit-recruitment', $context);
    }

    // Updating the Recruitment
    public function update(Recruitment $recruitment)
    {
        // Data Validation
        request()->validate([
            'playable_class_id' => 'required',
            'comment' => 'required',
        ]);

        $is_active = 0;

        // Checking the 'is_active' checkbox
        if(request('is_active'))
        {
            $is_active = 1;
        }

        // Assigning values
        $recruitment->playable_class_id = request('playable_class_id');
        $recruitment->comment = request('comment');
        $recruitment->is_active = $is_active;
        $recruitment->save();

        Toastr::success('Recruitment updated successfuly!', 'System message');

        return redirect(route('recruit.adminindex'));
    }


}
