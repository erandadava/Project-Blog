<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        //
        $posts = BlogPost::all();
        return view('blog.index', [
            'posts' => $posts
        ]);
    }


    public function create()
    {
        return view('blog.create');
    }


    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1,
        ]);

        return redirect('/blog/' . $newPost->id);
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog.show',[
            'post' => $blogPost
        ]); //returns the fetched posts
    }

    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit',[
            'post' => $blogPost
        ]); //return the edit view with Post
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect('/blog');
    }
}
