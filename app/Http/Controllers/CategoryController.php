<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public static function create() {

        return view('layouts.create-category', ['categories' => Categories::all()]);
    }

    public static function store(Request $request) {

        $validateData = $request->validate([
            'category_name' => ['required', 'unique:categories,category_name']
        ]);
        
        Categories::create(['category_name' => strtolower($validateData['category_name'])]);
        return redirect()->back()->with('added', 'Category added');
    }

    public static function destroy(Categories $category) {
        $category->delete();
        return redirect()->back();
    }

    public static function update(Categories $category, Request $request) {
   
        $validateData = $request->validate([
            'category_name' => ['required', 'unique:categories,category_name']
        ]);        
        $category->update(['category_name' => strtolower($validateData['category_name'])]);
        return redirect()->back()->with('updated', 'Category updated');
    }
}
