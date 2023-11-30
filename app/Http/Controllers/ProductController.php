<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Database\Seeders\ProductsTableSeeder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }



    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],


            'image' => ['required'],
        ]);

        $filename = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = date('ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('images/', $filename);
            }
        }
        Product::create([

            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $filename,
        ]);



        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'image' => ['required'],

        ]);

        $filename = '';



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = date('ymdhms') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('images/', $filename);
            }
        }


        $product->update($request->all());
        // Product::find($request->product_id)->update([

        //     'name' => $request->name,
        //     'quantity' => $request->quantity,
        //     'price' => $request->price,
        //     'image' => $filename,
        // ]);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
