<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('admin.news.cat.index-newscat', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Displaying the Create News category form
        return view('admin.news.cat.create-newscat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        request()->validate([
            'name' => 'required|min:6'
        ]);

        $category = new Category;
        $category->name = Str::lower($request['name']);
        $category->name = Str::ucfirst($category->name);
        $category->slug = Str::slug($request['name'], '-');
        $category->save();

        Toastr::success('News Category Added Successfuly!', 'System message');

        return redirect(route('newscat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $category = Category::find($id);

        return view('admin.news.cat.edit-newscat', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the category
        $category = Category::find($id);

        // Validate inputs
        request()->validate([
            'name' => 'required|min:6',
        ]);

        $category->name = Str::lower($request['name']);
        $category->name = Str::ucfirst($category->name);
        $category->slug = Str::slug($request['name'], '_');
        $category->save();

        Toastr::success('News Category Updated Successfuly!', 'System message');

        return redirect(route('newscat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Deleting a category
        $category->delete();

        return redirect(route('newscat.index'));
    }
}
