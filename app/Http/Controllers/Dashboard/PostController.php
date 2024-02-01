<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StorePostRequest, UpdatePostRequest};
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = new Post;
        $posts = request()->has('category') && request()->get('category') != '' ? $posts->whereCategoryId(request()->get('category')) : $posts;
        $posts = $posts->orderByDesc('id')->get();
        return view('dashboard.posts.index', compact('posts'));
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
        $inputs = $request->except(['_token', 'links', 'actress']);

        $inputs['image'] = $request->image->store('posts', 'public');;

        $inputs['user_id'] = auth()->user()->id;

        $post = Post::create($inputs);

        if ($post) {
            foreach ($request->links as $link) {
                DB::table('posts_links')->insert([
                    'post_id' => $post->id,
                    'link' => $link
                ]);
            }

            if ($request->actress) {
                foreach ($request->actress as $actor) {
                    DB::table('post_actress')->insert([
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
        $post_actresses = DB::table('post_actress')->where('post_id', $post->id)->pluck('actress_id', 'actress_id')->toArray();
        $post_links = DB::table('posts_links')->where('post_id', $post->id)->get();
        return view('dashboard.posts.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $inputs = $request->except(['_token', 'links', 'actress']);

        if ($request->image) {
            $image_path = storage_path('app\public\\') . $post->image;
            if (file_exists($image_path))
                unlink($image_path);
            $inputs['image'] = $request->image->store('posts', 'public');
        } else {
            $inputs['image'] = $post->image;
        }

        $inputs['user_id'] = auth()->user()->id;

        $post->update($inputs);

        if ($post) {
            $links = DB::table('posts_links')->where('post_id', $post->id)->get();

            foreach ($links as $link) {
                DB::table('posts_links')->where('post_id', $post->id)->delete();
            }

            foreach ($request->links as $link) {
                if ($link != null) {
                    DB::table('posts_links')->insert([
                        'post_id' => $post->id,
                        'link' => $link
                    ]);
                }
            }

            if ($request->actress) {
                $actress = DB::table('post_actress')->where('post_id', $post->id)->get();

                foreach ($actress as $actor) {
                    DB::table('post_actress')->where('post_id', $post->id)->delete();
                }

                foreach ($request->actress as $actor) {
                    DB::table('post_actress')->insert([
                        'post_id' => $post->id,
                        'actress_id' => $actor
                    ]);
                }
            }
        }

        Alert::success('تهانينا', 'تم النشر بنجاح');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function filter()
    {

    }
}
