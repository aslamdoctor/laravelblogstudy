<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use App\Rules\isAslam;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::paginate(2);

        return view('posts.list', array(
			'posts' => $posts
		));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'unique:posts','max:255', new isAslam],
			'content' => 'required',
		]);


		$post = new Post();
		$post->title = $request->title;
		$post->content = $request->content;
		$post->save();

		return redirect(route("postList"))->with("status", "Record added successfully!!");
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
        $post = Post::findOrFail($id);
        return view('posts.edit', [
			'post' => $post
		]);
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
		$request->validate([
			'title' => ['required', 'unique:posts,title,'.$id.'','max:255', new isAslam],
			'content' => 'required',
		]);
		
		$post = Post::findOrFail($id);
		$post->title = $request->title;
		$post->content = $request->content;
		$post->save();

		return redirect(route("postList"))->with("status", "Record updated successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$post = Post::find($id);
		
		if($post){
			$post->delete();
		}

		return redirect(route("postList"))->with("status", "Record deleted successfully!!");
    }
}
