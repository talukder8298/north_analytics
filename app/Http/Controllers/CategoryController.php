<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('sort')->get();

        return view('backend.pages.category.index', compact('categories'));
    }

    public function add() {
        $maxSort = Category::max('sort');
        return view('backend.pages.category.create',compact('maxSort'));
    }

    public function addPost(Request $request) {
        $messages = [
            'name.required'   => 'The name field is required.',
            'type_id.required'=> 'The type field is required.',
            'radio.required'  => 'The status field is required.'
        ];
        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'description'=>' nullable|max:600',
            'sort' => 'required|integer|min:1',
            'radio' => 'required',
        ],$messages);

        $category = new Category();
        $category->name = $request->name;
        $category->type_id = $request->type_id;
        $category->description = $request->description;
        $category->sort = $request->sort;
        $category->status = $request->radio;

        if ($category->save()) {
            $message = 'Category created successfully.';
            $error = 'false';
            return redirect()->route('category')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('category')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Category $category) {
        return view('backend.pages.category.edit', compact('category'));
    }

    public function editPost(Category $category, Request $request) {
        $messages = [
            'name.required'   => 'The name field is required.',
            'type_id.required'=> 'The type field is required.',
            'radio.required'  => 'The status field is required.'
        ];
        $request->validate([
            'name' => 'required|max:255',
            'type_id' => 'required',
            'description'=>' nullable|max:600',
            'sort' => 'required|integer|min:1',
            'radio' => 'required',
        ],$messages);

        $category->name = $request->name;
        $category->type_id = $request->type_id;
        $category->description = $request->description;
        $category->sort = $request->sort;
        $category->status = $request->radio;

        if ($category->save()) {
            $message = 'Category updated successfully.';
            $error = 'false';
            return redirect()->route('category')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('category')->with(['message' => $message, 'error' => $error]);
        }
    }
}
