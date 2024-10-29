<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $newPost = Post::latest()->first();
        
        $relatedPosts = $newPost->category->posts() 
        ->where('id', '!=', $newPost->id) 
        ->latest()
        ->take(3)
        ->get();

        return view('clients.pages.home', compact('newPost', 'relatedPosts'));
    }

    public function getPostByCategory($id) {
        $category = Category::findOrFail($id);

        $newPost = $category->posts()->latest()->first();

        $relatedPosts = $newPost->category->posts()
        ->where('id', '!=', $newPost->id) 
        ->latest()
        ->take(3)
        ->get();

        return view('clients.pages.read_by_category', compact('category', 'newPost', 'relatedPosts'));
    }

    public function getDetail($id) {
        $post = Post::findOrFail($id);
        $category = $post->category;
        $comments = $post->comments()->latest()->take(10)->get();

        return view('clients.pages.detail', compact('post', 'category', 'comments'));
    }

    public function sendComment(Request $req) {
        Comment::create([
            'content' => $req->content,
            'post_id' => $req->post_id,
            'user_id' => auth()->user()->id
        ]);

        $post = Post::findOrFail($req->post_id);
        $comments = $post->comments()->latest()->take(10)->get();

        $html = view('clients.blocks.comment', compact('comments'))->render();
        return response()->json([
            'html' => $html
        ]);
    }
}
