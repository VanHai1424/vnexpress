<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.pages.post.add-post', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->all();

        $file = $request->file('poster');

        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $data['poster'] = $fileName;

        $post = Post::create($data);
        
        if($post) {
            $file->storeAs('public/upload/', $fileName);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.pages.post.update-post', compact('post', 'categories', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->all();

        if($request->hasFile('poster')) {
            $file = $request->file('poster');
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $data['poster'] = $fileName;
        }

        $ok = $post->update($data);
        
        if($ok && $request->hasFile('poster')) {
            $file->storeAs('public/upload/', $fileName);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
