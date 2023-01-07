<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\Profession;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CraftController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $crafts = Craft::all();

      return view('admin.craft.index-craft', ['crafts' => $crafts]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $professions = Profession::all();

      return view('admin.craft.create-craft', ['professions' => $professions]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    // Input Validation
    request()->validate([
      'name' => 'required|min:4',
      'profession_id' => 'required',
      'wowhead_link' => 'required|url',
      'quality' => 'required'
    ]);

    try
    {
      $craft = new Craft();
      $craft->user_id = Auth()->user()->id;
      $craft->name = request('name');
      $craft->profession_id = request('profession_id');
      $craft->wowhead_link = request('wowhead_link');
      $craft->quality = request('quality');
      $craft->comment = request('comment');
      $craft->save();

      Toastr::success('Recipe added successfuly!', 'System message');

      return redirect(route('craft.index'));
    }
    catch(Exception $e)
    {
      $e->getCode();
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Craft $craft)
  {
    $professions = Profession::all();

    $context = [
      'craft' => $craft,
      'professions' => $professions,
    ];

    return view('admin.craft.edit-craft', $context);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Craft $craft)
  {
    // Validate inputs
    request()->validate([
      'name' => 'required|min:4',
      'profession_id' => 'required',
      'wowhead_link' => 'required|url',
      'quality' => 'required'
    ]);

    try 
    {
      $craft->name = request('name');
      $craft->profession_id = request('profession_id');
      $craft->wowhead_link = request('wowhead_link');
      $craft->quality = request('quality');
      $craft->comment = request('comment');
      $craft->save();

      Toastr::success('Recipe updated successfuly!', 'System message');

      return redirect(route('craft.index'));
    }
    catch(Exception $e)
    {
      Toastr::error($e->getMessage(), 'System Error'.$e->getCode());

      return redirect(back());
    }
  }

  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Craft $craft)
    {
      try{
        $craft->delete();

        Toastr::success('Recipe deleted successfuly!', 'System message');

        return redirect(route('craft.index'));
      }
      catch(Exception $e)
      {
        Toastr::error($e->getMessage(), 'System Error'.$e->getCode());
  
        return redirect(route('craft.index'));
      }
    }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function public_index()
  {
    $crafts = Craft::paginate(15);

    $context = [
        'crafts' => $crafts,
    ];

    return view('guild.craft.index-craft', $context);
  }

  /**
   * Display a listing of the resource by category.
   *
   * @return \Illuminate\Http\Response
   */
  public function showCategory(Profession $profession)
  {
    $crafts = Craft::where('profession_id', $profession->id)->paginate(15);

      $context = [
        'crafts' => $crafts,
        'profession' => $profession,
      ];

    return view('guild.craft.profession-craft', $context);
  }
}
