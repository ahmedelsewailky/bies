<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Handle the index page for project.
     */
    public function __invoke()
    {
        $posts = new Post;
        $movies =  Category::whereParentId(1)->select('id', 'name')->pluck('id', 'name');
        $series =  Category::whereParentId(3)->select('id', 'name')->pluck('id', 'name');
        $latest = Post::orderByDesc('id')->paginate(16);
        return view('website.index', get_defined_vars());
    }

    public function getByCategory(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(24);
        return view('website.posts-category', compact('category', 'posts'));
    }
}
