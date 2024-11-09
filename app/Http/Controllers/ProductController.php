<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('product_id', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($request->has('sort_by')) {
            $sortBy = $request->sort_by;
            $order = $request->order ?? 'asc';
            $query->orderBy($sortBy, $order);
        }

        $products = $query->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_id' => 'required|unique:products|max:255',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|string',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|max:255|unique:products,product_id,' . $id,
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);

        $product->update($validated);

        return redirect()->route('products.show', $id)->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
