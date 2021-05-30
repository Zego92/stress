<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $posts = Post::all()->count();
        $categories = Category::all()->count();
        $feedbacks = Feedback::all()->count();
        $users = User::all()->count();
        return view('admin.home')
            ->with('posts', $posts)
            ->with('categories', $categories)
            ->with('feedbacks', $feedbacks)
            ->with('users', $users);
    }

}
