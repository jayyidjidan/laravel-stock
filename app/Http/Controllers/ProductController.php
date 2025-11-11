<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan dashboard
    public function dashboard()
    {
        $totalProducts = Product::count();
        $emptyProducts = Product::where('amount', 0)->count();
        $needRestock = Product::where('amount', '<', 10)->count();
        $featuredProducts = Product::orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard', compact('totalProducts', 'emptyProducts', 'needRestock', 'featuredProducts'));
    }

    // Menampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0'
        ]);

        Product::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Product created successfully.');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Product updated successfully.');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Product deleted successfully.');
    }
}