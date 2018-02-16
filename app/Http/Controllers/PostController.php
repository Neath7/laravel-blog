<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateBlogPost;
use App\User;
use App\Post;
use Auth;
use Redirect;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $posts = User::find(Auth()->user()->id)->posts()->paginate(5);
        return view('admin.post.index',['posts' => $posts]);
    }

    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store the incoming blog post.
     *
     * @param  StoreBlogPost  $request
     * @return Response
     */
    public function store(StoreBlogPost $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::user()->id
        ]);

        return Redirect::route('admin.post.index')->with('status', 'New post was created');
    }

    public function edit($id)
    {
        $post = User::getSinglePost($id);
        return view('admin.post.edit',['post'=>$post]);
    }

    public function update(UpdateBlogPost $request){
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        
        if($post->save()) {
            return Redirect::back()->with('status', 'Post was updated');
        } else {
            return Redirect::back()->with('error', 'Post cannot update');
        }
    }
}
