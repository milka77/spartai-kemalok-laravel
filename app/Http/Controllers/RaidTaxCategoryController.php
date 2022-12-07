<?php

namespace App\Http\Controllers;

use App\Models\RaidTaxCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class RaidTaxCategoryController extends Controller
{
    // Returning the admin index view
    public function index()
    {

        $raid_tax_cat = RaidTaxCategory::all();

        return view('admin.raidtax.cat.index-raidtaxcat', ['raid_tax_cat' => $raid_tax_cat]);
    }

    // Showing the new Raid Tax Category Form
    public function create()
    {
        return view('admin.raidtax.cat.create-raidtaxcat');
    }

    // Storing a Raid Tax Category
    public function store(Request $request)
    {
        // Data Validation
        request()->validate([
            'name' => 'required|min:6',
        ]);

        // Get the Raid Tax Category initials
        $words = explode(" ", request('name'));
        $initials = "";
        foreach ($words as $w)
        {
            $initials .= mb_substr($w, 0, 1);
        }

        // Assign the values
        $category = new RaidTaxCategory;
        $category->name = Str::lower($request['name']);
        $category->slug = Str::slug($request['name'], '-');
        $category->name = Str::title($category->name);
        $category->initials = Str::lower($initials);
        $category->save();

        // Displaying success message
        Toastr::success('Raid Tactic Category Added Successfuly!', 'System message');

        return redirect(route('raidtaxcat.index'));
    }

    // Shows the Raid Tax Category edit form
    public function edit(RaidTaxCategory $raidTaxCategory)
    {
        return view('admin.raidtax.cat.edit-raidtaxcat', ['raid_tax_cat' => $raidTaxCategory]);
    }

    // Updating the Raid Tax Category
    public function update(RaidTaxCategory $raidTaxCategory)
    {
        // Data Validation
        request()->validate([
            'name' => 'required|min:6',
        ]);

        // Get the Raid Tax Category initials
        $words = explode(" ", request('name'));
        $initials = "";
        foreach ($words as $w)
        {
            $initials .= mb_substr($w, 0, 1);
        }

        // Assign the values
        $raidTaxCategory->name = Str::lower(request('name'));
        $raidTaxCategory->slug = Str::slug(request('name'));
        $raidTaxCategory->name = Str::title($raidTaxCategory->name);
        $raidTaxCategory->initials = Str::lower($initials);
        $raidTaxCategory->save();

        // Displaying success message
        Toastr::success('Raid Tactic Category Updated Successfuly!', 'System message');

        return redirect(route('raidtaxcat.index'));
    }

    // Deleting a Raid Tax Category
    public function destroy(RaidTaxCategory $raidTaxCategory)
    {
        $raidTaxCategory->delete();

        // Displaying success message
        Toastr::success('Raid Tactic Category Deleted Successfuly!', 'System message');

        return redirect(route('raidtaxcat.index'));
    }
}
