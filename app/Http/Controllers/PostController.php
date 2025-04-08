<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
            public function index() 
        { 

        $posts = Post::all(); 
        return view('posts.index', compact('posts')); 
       
        }

      
        public function create() 
        { 
        return view('posts.create'); 
        }
       
        public function store(Request $request) 
        { 

        $request->validate([ 
        'title' => 'required|max:255', 
        'content' => 'required', 
        ]); 
        Post::create([ 
        'title' => $request->title, 
        'content' => $request->content, 
        ]); 
        return redirect()->route('posts.index'); 
        }
        
        public function edit(Post $post) 
        { 

        return view('posts.edit', compact('post')); 
       
        }
   
        public function update(Request $request, Post $post)
        {
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
        
            // Update the post
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        
            return redirect()->route('posts.index');
        }        
       // Delete
       public function destroy(Post $post)
       {
           $post->delete();
           return redirect()->route('posts.index');
       }       
       
}
