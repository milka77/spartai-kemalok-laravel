<?php

namespace App\Http\Controllers;

use App\Models\RaidTax;
use App\Models\RaidTaxCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RaidTaxController extends Controller
{
    // Admin Raid Tactics index page
    public function adminIndex()
    {
        $raid_taxes = RaidTax::orderBy('id', 'desc')->paginate(10);

        return view('admin.raidtax.index-raidtax', ['raid_taxes' => $raid_taxes]);
    }

    // Admin Raid Tactics Form
    public function create()
    {
        $categories = RaidTaxCategory::all();

        $context = [
            'categories' => $categories,
        ];

        return view('admin.raidtax.create-raidtax', $context);
    }

    //Admin Store Raid Tactics
    public function store(Request $request)
    {
        // Data Validation
        request()->validate([
            'boss_name' => 'required|min:5',
            'title_1' => 'required|min:5',
            'body_1' => 'required',
            'raid_tax_category' => 'required',
        ]);

        // Assigning the values
        $data = [
            'user_id' => Auth()->user()->id,
            'raid_tax_category_id' => request('raid_tax_category'),
            'boss_name' => request('boss_name'),
            'slug' => Str::slug(request('boss_name'), '-'),
            'title_1' => request('title_1'),
            'body_1' => request('body_1'),
            'mythic_1' => request('mythic_1'),
            'title_2' => request('title_2'),
            'body_2' => request('body_2'),
            'mythic_2' => request('mythic_2'),
            'title_3' => request('title_3'),
            'body_3' => request('body_3'),
            'mythic_3' => request('mythic_3'),
            'title_4' => request('title_4'),
            'body_4' => request('body_4'),
            'mythic_4' => request('mythic_4'),
            'title_5' => request('title_5'),
            'body_5' => request('body_5'),
            'mythic_5' => request('mythic_5'),
        ];

        // Checking images
        if(request('file_path_1')){
            $data['file_path_1'] = request('file_path_1')->store('images/raidtax', 's3');
        }

        if(request('file_path_2')){
            $data['file_path_2'] = request('file_path_2')->store('images/raidtax', 's3');
        }

        if(request('file_path_3')){
            $data['file_path_3'] = request('file_path_3')->store('images/raidtax', 's3');
        }

        if(request('file_path_4')){
            $data['file_path_4'] = request('file_path_4')->store('images/raidtax', 's3');
        }

        if(request('file_path_5')){
            $data['file_path_5'] = request('file_path_5')->store('images/raidtax', 's3');
        }

        
        // Creating the Raid Tactics
        auth()->user()->raidTax()->create($data);

        Toastr::success('Raid Tactic added successfuly!', 'System message');

        return redirect(route('raidtax.adminindex'));
    }

    // Displaying the edit RaidTax Form
    public function edit(RaidTax $raidTax)
    {
        $categories = RaidTaxCategory::all();       

        $context = [
            'categories' => $categories,
            'raid_tax' => $raidTax,
        ];
        
        return view('admin.raidtax.edit-raidtax', $context);
    }

    // Updating the Raid Tactics 
    public function update(RaidTax $raidTax)
    {
        // Data validation
        request()->validate([
            'boss_name' => 'required|min:5',
            'title_1' => 'required|min:5',
            'body_1' => 'required',
            'raid_tax_category' => 'required',
        ]);

        $raidTax->raid_tax_category_id = request('raid_tax_category');
        $raidTax->boss_name = request('boss_name');
        $raidTax->slug = Str::slug(request('boss_name'), '-');
        $raidTax->title_1 = request('title_1');
        $raidTax->body_1 = request('body_1');
        $raidTax->mythic_1 = request('mythic_1');
        $raidTax->title_2 = request('title_2');
        $raidTax->body_2 = request('body_2');
        $raidTax->mythic_2 = request('mythic_2');
        $raidTax->title_3 = request('title_3');
        $raidTax->body_3 = request('body_3');
        $raidTax->mythic_3 = request('mythic_3');
        $raidTax->title_4 = request('title_4');
        $raidTax->body_4 = request('body_4');
        $raidTax->mythic_4 = request('mythic_4');
        $raidTax->title_5 = request('title_5');
        $raidTax->body_5 = request('body_5');
        $raidTax->mythic_5 = request('mythic_5');

        // Checking images
        if(request('file_path_1')){
            $raidTax->file_path_1 = request('file_path_1')->store('images/raidtax', 's3');
        }

        if(request('file_path_2')){
            $raidTax->file_path_2 = request('file_path_2')->store('images/raidtax', 's3');
        }

        if(request('file_path_3')){
            $raidTax->file_path_3 = request('file_path_3')->store('images/raidtax', 's3');
        }

        if(request('file_path_4')){
            $raidTax->file_path_4 = request('file_path_4')->store('images/raidtax', 's3');
        }

        if(request('file_path_5')){
            $raidTax->file_path_5 = request('file_path_5')->store('images/raidtax', 's3');
        }

        // Updating with new Values
        $raidTax->save();

        Toastr::success('Raid Tactic updated successfuly!', 'System message');

        return redirect(route('raidtax.adminindex'));
    }

    // Raid Tactics index 
    public function index()
    {
        $tactics = RaidTax::selectRaw('*')
            ->orderBy('raid_tax_category_id')
            ->get();
        $categories = RaidTaxCategory::all();

        $context = [
            'tactics' => $tactics,
            'categories' => $categories,
        ];

        return view('guild.tax.raidtax', $context);
    }

    public function destroy(RaidTax $raidTax)
    {
        $raidTax->delete();

        return redirect(route('raidtax.adminindex'));
    }

    public function categoryShow(RaidTaxCategory $raidTaxCategory)
    {   
        $tactics = RaidTax::where('raid_tax_category_id', $raidTaxCategory->id)->get();

        $context = [
            'raidTaxCategory' => $raidTaxCategory,
            'tactics' => $tactics,
        ];

        return view('guild.tax.raidtax-category', $context);
    }

    public function show(RaidTaxCategory $raidTaxCategory, RaidTax $raidTax)
    {
        return view('guild.tax.raidtax-show', ['tax' => $raidTax]);
    }
}
