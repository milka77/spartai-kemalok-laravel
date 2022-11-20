<?php

namespace App\Http\Controllers;

use App\Models\RaidTaxDifficulty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class RaidTaxDifficultyController extends Controller
{
    // Admin Index Page
    public function index()
    {

        $difficulties = RaidTaxDifficulty::all();

        $context = [
            'raid_difficulties' => $difficulties,
        ];

        return view('admin.raidtax.diff.index-raiddiff', $context);
    }

    // Admin Raid Tactics Difficulty Form
    public function create()
    {
        return view('admin.raidtax.diff.create-raiddiff');
    }

    // Admin Raid Tactics Difficulty - Storing
    public function store(Request $request)
    {
        // Data validation
        request()->validate([
            'name' => 'required|min:4'
        ]);

        // Assign the values
        $difficulty = New RaidTaxDifficulty;
        $difficulty->name = Str::lower($request['name']);
        $difficulty->slug = Str::slug($request['name'], '-');
        $difficulty->name = Str::title($difficulty->name);
        $difficulty->save();

        // Displaying success message
        Toastr::success('Raid Tactic Category Added Successfuly!', 'System message');

        return redirect(route('raidtaxdiff.index'));
    }

    // Admin Raid Tactics Difficulty - Edit form
    public function edit(RaidTaxDifficulty $raidTaxDifficulty)
    {
        return view('admin.raidtax.diff.edit-raiddiff', ['raid_tax_difficulty' => $raidTaxDifficulty]);
    }

    // Admin Raid Tactics Difficulty - Updating
    public function update(RaidTaxDifficulty $raidTaxDifficulty)
    {
        // Data validation
        request()->validate([
            'name' => 'required|min:4',
        ]);

        // Assign the values
        $raidTaxDifficulty->name = Str::lower(request('name'));
        $raidTaxDifficulty->slug = Str::slug(request('name'), '-');
        $raidTaxDifficulty->name = Str::title($raidTaxDifficulty->name);
        $raidTaxDifficulty->save();
        
        // Displaying success message
        Toastr::success('Raid Tactic Difficulty Updated Successfuly!', 'System message');
    
        return redirect(route('raidtaxdiff.index'));
    }

    // Deleting a Raid Tax Difficulty
    public function destroy(RaidTaxDifficulty $raidTaxDifficulty)
    {
        $raidTaxDifficulty->delete();

        // Displaying success message
        Toastr::success('Raid Tactic Difficulty Deleted Successfuly!', 'System message');

        return redirect(route('raidtaxdiff.index'));
    }
}
