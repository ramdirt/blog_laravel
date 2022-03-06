<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('tags', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image'
        ]);
        
        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);
        
        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Пост добавлен');
    }


    public function show($id)
    {
        // empty
    }

    public function edit($id)
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image'
        ]);

        $post = Post::find($id);

        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);
        
        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Изминения сохранены');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->sync([]);
        Storage::delete($post->thumbnail);
        $post->delete();
        
        return redirect()->route('posts.index')->with('success', 'Категория удалена');
    }
}