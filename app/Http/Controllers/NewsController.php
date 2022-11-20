<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Admin index view
    public function index()
    {
        $all_news = News::paginate(10);
        
        return view('admin.news.index-news', ['all_news' => $all_news]);
    }

    // Show the create news form
    public function create()
    {
        $categories = Category::all();

        return view('admin.news.create-news', ['categories' => $categories]);
    }

    // Store the news
    public function store(Request $request)
    {
        // Data Validation
        request()->validate([
            'title' => 'required|min:10',
            'body' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'title' => $request['title'],
            'category_id' => $request['category'],
            'body' => $request['body'],
            'user_id' => Auth()->user()->id,
        ];

        // Checking if news image exist
        if(request('file_path')){
            $data['file_path'] = request('file_path')->store('images', 's3');
        }

        auth()->user()->news()->create($data);

        Toastr::success('News added successfuly!', 'System message');

        return redirect(route('news.index'));
    }

    // Showing the edit News form view
    public function edit(News $news)
    {

        $categories = Category::all();

        $context = [
            'categories' => $categories,
            'news' => $news,
        ];
        
        return view('admin.news.edit-news', $context);
    }

    // Updating the News
    public function update(News $news, Request $request)
    {
        // Data validation
        request()->validate([
            'title' => 'required|min:10',
            'body' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Checking if news image exist and update with new data
        if(request('file_path')){
            $news->file_path = request('file_path')->store('images', 's3');
        }

        // Assign data
        $news->title = $request['title'];
        $news->category_id = $request['category'];
        $news->body = $request['body'];

        $news->save();

        Toastr::success('News Updated successfuly!', 'System message');

        return redirect(route('news.index'));
    }

    // Destroying a news
    public function destroy(News $news)
    {
        $news->delete();

        return redirect(route('news.index'));
    }
}
