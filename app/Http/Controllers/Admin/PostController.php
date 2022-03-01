<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use \Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        return redirect()->route('posts.index')->with('success', 'Категория добавлена');
    }


    public function show($id)
    {
        // empty
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
        ]);

        return redirect()->route('posts.index')->with('success', 'Категория обновлена');
    }

    public function destroy($id)
    {

        return redirect()->route('posts.index')->with('success', 'Категория удалена');

    }
}