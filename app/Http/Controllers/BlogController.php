<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Blog;


class BlogController extends Controller
{
    public function index(){
    //    return $blogs = Blog::all();
        return inertia::render('index',['blogs' => Blog::all()]);
    }

    public function create(){
        return inertia::render('create');
    }


    // Store Blogs
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:blogs',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        // Blog::create($validated);

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/images'), $fileName);
            $fileName = "/uploads/images/" . $fileName;
        }

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $fileName;
        $blog->save();
        
        return Redirect::route('blogs.index');
    }

    public function show(){

    }

    public function edit(Blogs $blog){
        return $blog;

    }

    public function update(){

    }

    public function distroy(){

    }

    
}
