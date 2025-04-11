<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string'
        ]);
        
        $category = Category::create($validated);
        return response()->json($category, 201);
    }
    
    public function show($id) {
        return Category::findOrFail($id);
    }
    
    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);  
        
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:categories,name,'.$id,
            'description' => 'nullable|string'
        ]);
        
        $category->update($validated);
        return response()->json($category);
    }
    
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return response()->noContent();
    }
}
