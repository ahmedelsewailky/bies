<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Handle the index page for project.
     */
    public function __invoke()
    {
        return view('website.index');
    }
}
