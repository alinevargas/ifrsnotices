<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PostController extends Controller {

    public function index() {
        $posts = post::all();

        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function create() {
        $post = new post();

        $categories = Category::all();

        return view('post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $rules = [
            'post_date' => 'required',
            'title' => 'required|min:3|max:255',
            'summary' => 'required|min:3|max:255',
            'text' => 'required|min:3',
            'category_id' => 'required|exists:categories,id'
        ];

        $messages = [
            'post_date.required' => 'O campo data deve ser preenchido',
            'title.required' => 'O campo título deve ser preenchido',
            'title.min' => 'O campo título deve ter pelo menos 3 caracteres',
            'title.max' => 'O campo título deve ter no máximo 255 caracteres',
            'summary.required' => 'O campo sumário deve ser preenchido',
            'summary.min' => 'O campo sumário deve ter pelo menos 3 caracteres',
            'summary.max' => 'O campo sumário deve ter no máximo 255 caracteres',
            'text.required' => 'O campo texto deve ser preenchido',
            'text.min' => 'O campo texto deve ter pelo menos 3 caracteres',
            'category_id.required' => 'Uma categoria deve ser selecionada',
            'category_id.exists' => 'Você deve selecionar uma categoria válida'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = new Post();

        $post->category_id = $request->input('category_id');
        $post->category_id = $request->input('post_date');
        $post->category_id = $request->input('title');
        $post->category_id = $request->input('summary');
        $post->category_id = $request->input('text');

        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit($id) {
        $post = Post::find($id);

        $categories = Category::all();

        return view('post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        $rules = [
            'post_date' => 'required',
            'title' => 'required|min:3|max:255',
            'summary' => 'required|min:3|max:255',
            'text' => 'required|min:3',
            'category_id' => 'required|exists:categories,id'
        ];

        $messages = [
            'post_date.required' => 'O campo data deve ser preenchido',
            'title.required' => 'O campo título deve ser preenchido',
            'title.min' => 'O campo título deve ter pelo menos 3 caracteres',
            'title.max' => 'O campo título deve ter no máximo 255 caracteres',
            'summary.required' => 'O campo sumário deve ser preenchido',
            'summary.min' => 'O campo sumário deve ter pelo menos 3 caracteres',
            'summary.max' => 'O campo sumário deve ter no máximo 255 caracteres',
            'text.required' => 'O campo texto deve ser preenchido',
            'text.min' => 'O campo texto deve ter pelo menos 3 caracteres',
            'category_id.required' => 'Uma categoria deve ser selecionada',
            'category_id.exists' => 'Você deve selecionar uma categoria válida'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = Post::find($id);

        $post->category_id = $request->input('category_id');
        $post->category_id = $request->input('post_date');
        $post->category_id = $request->input('title');
        $post->category_id = $request->input('summary');
        $post->category_id = $request->input('text');


        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }

}