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

    public function tableShow(){
        return inertia::render('table',['blogs' => Blog::all()]);

    }

    public function show(Blog $blog){
        return inertia::render('singleView',['blog' => $blog]);
    }

    public function edit(Blog $blog){
        return inertia::render('edit', ['blog' => $blog]);

    }

    public function update(Request $request, Blog $blog){
        return $request->title;
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);
        // return $validated;

        
        $fileName = null;
        if($request->hasFile('image')){            
            File::delete(public_path($blog->image));
            $fileName = time(). '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/images'), $fileName);
            $fileName = '/uploads/images/'. $fileName;
        }

        $mainBlog = Blog::find($blog);
        // return $mainBlog;

        $mainBlog->title = $request->title;
        $mainBlog->description = $request->description;
        $mainBlog->image = $fileName;
        
        // // return 'abcd';
        // return $mainBlog;
        $blog ->update($mainBlog);
        // $validated->image = $fileName;

        // $blog->update($validated);
        
        return Redirect::route('blogs.table');

    }

    public function distroy(Blog $blog){
        $blog->delete();
        return Redirect::route('blogs.table');
    }

    
}
