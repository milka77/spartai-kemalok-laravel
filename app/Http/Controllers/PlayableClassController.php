<?php

namespace App\Http\Controllers;

use App\Models\PlayableClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class PlayableClassController extends Controller
{
    //Admin index view
    public function index()
    {
        $classes = PlayableClass::orderBy('name')->get();

        return view('admin.recruitment.class.index-class', ['classes' => $classes]);
    }

    // Create Class Form
    public function create()
    {
        return view('admin.recruitment.class.create-class');
    }

    // Store Class in DB
    public function store()
    {
        // Data validation
        request()->validate([
            'name' => 'required|min:4'
        ]);

        $class = new PlayableClass;
        $class->name = Str::lower(request('name'));
        $class->slug = Str::slug(request('name'));
        $class->name = Str::title($class->name);
        $class->save();

        // Displaying success message
        Toastr::success('Class Added Successfuly!', 'System message');

        return redirect(route('class.index'));
    }

    // Show Edit form
    public function edit(PlayableClass $playableClass)
    {
        return view('admin.recruitment.class.edit-class', ['class' => $playableClass]);
    }

    // Update Class
    public function update(PlayableClass $playableClass)
    {
        // Data validation
        request()->validate([
            'name' => 'required|min:4',
        ]);

        // Assign the values
        $playableClass->name = Str::lower(request('name'));
        $playableClass->slug = Str::slug(request('name'));
        $playableClass->name = Str::title($playableClass->name);
        $playableClass->save(); 

        // Displaying success message
        Toastr::success('Class Updated Successfuly!', 'System message');

        return redirect(route('class.index'));
    }
}
