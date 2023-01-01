<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ProfessionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $professions = Profession::all();

    return view('admin.professions.index-prof', ['professions' => $professions]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.professions.create-prof');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    try {
      // Field validation
      request()->validate([
          'name' => 'required',
      ]);

      $profession = new Profession();
      $profession->name = Str::lower(request('name'));
      $profession->name = Str::ucfirst($profession->name);
      $profession->slug = Str::slug(request('name'), '_');
      $profession->save();

      Toastr::success('Profession added successfuly!', 'System message');

      return redirect(route('prof.index'));

    } catch(Exception $e) {
      return redirect(route('prof.create', ['error' => $e]));
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Profession $profession)
  {
    return view('admin.professions.edit-prof', ['profession' => $profession]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Profession $profession)
  {
    // Validate inputs
    request()->validate([
      'name' => 'required',
    ]);

    try 
    {
      $profession->name = Str::lower(request('name'));
      $profession->name = Str::ucfirst($profession->name);
      $profession->slug = Str::slug(request('name'), '_');
      $profession->save();

      Toastr::success('Profession updated successfuly!', 'System message');

      return redirect(route('prof.index'));
    } 
    catch(Exception $e)
    {
      Toastr::error('Profession updated successfuly!', 'System message');

      return redirect(route('prof.update', ['error' => $e]));
    }
  }

  public function destroy(Profession $profession)
  {
    try
    {
      $profession->delete();

      Toastr::success('Profession deleted succesfuly!', 'System message');
      
      return redirect(route('prof.index'));
    } 
    catch(Exception $e)
    {
      
      Toastr::error('Something went wrong! '.$e->getMessage().'..' , 'Error: '.$e->getCode());

      return redirect(route('prof.index'));
    }
  }

}
