<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StorePostRequest, UpdatePostRequest};
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index')->with([
            'posts' => Post::orderByDesc('id')->get(),
            'parentCategories' => \App\Models\Category::whereNull('parent_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return $request;
        $inputs = $request->except(['_token', 'links', 'actress']);

        $inputs['image'] = $this->imageHandler($request);

        $inputs['user_id'] = auth()->user()->id;

        $post = Post::create($inputs);

        if ($post) {
            foreach ($request->links as $link) {
                DB::table('posts_links')->insert([
                    'post_id' => $post->id,
                    'link' => $link
                ]);
            }

            // Programs type has not actress
            if ($request->category_id != 2) {
                foreach ($request->actress as $actor) {
                    DB::table('posts_actresses')->insert([
                        'post_id' => $post->id,
                        'actress_id' => $actor
                    ]);
                }
            }
        }

        Alert::success('تهانينا', 'تم النشر بنجاح');

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
        $inputs = $request->except(['_token', 'links', 'actress']);

        return $inputs;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * Handling posts image
     *
     * @param $request
     */
    private function imageHandler($request)
    {
        if ($request->category_id == 1) {
            $folder = 'movie';
        } elseif($request->category_id == 2) {
            $folder = 'program';
        } elseif ($request->category_id == 3) {
            $folder = 'series';
        } else {
            $folder = 'broadcast';
        }

        return $request->image->store($folder, 'public');
    }
}
