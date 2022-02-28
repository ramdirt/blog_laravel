<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use \Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Category::create($request->all());
        // session()->flash('success', 'Категория добавлена');
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }


    public function show($id)
    {
        // empty
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Категория обновлена');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');

    }
}