<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;

class HomeController extends Controller {
    
    public function index() {
        $categories = Category::all();

        return view('home', [
            'categories' => $categories
        ]);
    }

    public function quiz(Request $request) {
        $posts = Post::where('category_id', $request->input('category'))
                                ->orderByRaw('RAND()')
                                ->take($request->input('posts'))
                                ->get();

        return view('quiz', [
            'posts' => $posts
        ]);
    }

    public function result(Request $request) {
        $posts = [];
        $total = 0;
        $count = count($request->input('posts'));

        foreach($request->input('posts') as $post_id => $active_id) {
            $post = Post::find($post_id);
            $correctActive = $post->actives()->where('correct', true)->first();

            if($correctActive->id == $active_id) {
                $total++;
                $post->correct = true;
            } else {
                $post->correct = false;
            }

            array_push($posts, $post);
        }

        return view('result', [
            'posts' => $posts,
            'total' => $total,
            'count' => $count
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
