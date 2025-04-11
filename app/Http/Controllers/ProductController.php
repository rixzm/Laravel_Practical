<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return Product::all();
        
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ]);
        
        $products = Product::create($validated);
        return response()->json($products, 201);
    }
    
    public function show($id) {
        return Product::findOrFail($id);
    }
    
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'quantity' => 'sometimes|required|integer|min:0'
        ]);
    
        $product->update($validated);
        return response()->json($product);
    }
    
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return response()->noContent();
    }
    
}
