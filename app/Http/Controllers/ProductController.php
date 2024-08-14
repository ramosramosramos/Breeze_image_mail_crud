<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchQuery = request()->input('search');
        $products = Product::query()
        ->when($searchQuery,function($query,$search){
            $query->where('name','like',"%$search%");
        })
        ->paginate(10)->withQueryString()
        ->through(fn($product) => [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image_path' => $product->image_path ? Storage::url($product->image_path) : null,
        ]);

        return inertia('AllowedPages/Product', [
            'products' => $products,
            'filters'=>['search'=>$searchQuery],
        ]);
    }

    public function create()
    {
        return inertia('AllowedPages/Tools/CreateProduct');
    }

    public function store(StoreProductRequest $request)
    {
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('public/products')
            : 'null';

        // Create the product
        Product::create([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('created', 'Product created successfully.');
    }


    public function edit(Product $product)
    {
        return inertia('AllowedPages/Tools/EditProduct', [
            'product' => [

                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image_path' => $product->image_path ? Storage::url($product->image_path) : null
            ],

        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {  
        $imagePath = $product->image_path;

        if ($request->hasFile('image')) {
            
            if ($product->image_path && $product->image_path !== 'null') {
                Storage::delete($product->image_path);
            }
            
            // Store the new image and get its path
            $imagePath = $request->file('image')->store('public/products');
        }
        
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image_path' => $imagePath,
        ]);
        
        return redirect()->route('products.index')->with('updated', 'Product updated successfully.');
        
    }
    

    public function destroy(Product $product)
    {

     
            Storage::delete($product->image_path);
            $product->deleteQuietly();

        return redirect()->route('products.index')->with('deleted', 'Product deleted successfully.');
    }
}
