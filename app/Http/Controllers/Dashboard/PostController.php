<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StorePostRequest, UpdatePostRequest};
use App\Models\Actress;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index')->with([
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create')->with([
            'posts' => Post::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $inputs = $request->except(['_token', 'links', 'actress']);

        $inputs['image'] = $request->image->store('movies', 'public');

        $inputs['user_id'] = auth()->user()->id;

        $post = Post::create($inputs);

        if ($post) {
            foreach ($request->links as $link) {
                DB::table('posts_links')->insert([
                    'post_id' => $post->id,
                    'link' => $link
                ]);
            }

            foreach ($request->actress as $actor) {
                DB::table('posts_actresses')->insert([
                    'post_id' => $post->id,
                    'actress_id' => $actor
                ]);
            }
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit')->with([
            'posts' => Post::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->except('_token'));
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}