<?php

namespace App\Http\Controllers;

use App\Posts;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    // show 5 posts with pagination
    // controls root requests

    public function index()
    {
      // retrieve 5 posts from DB that are active and recent
      $posts = Posts::where('active',1)->orderBy('created_at', 'desc')
                ->paginate(5);

      // set page heading
      $title = 'Recent Posts';

      return view('home')->withPosts($posts)->withTitle($title);
    }
}
