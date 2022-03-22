<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::get();
    	return view('products.index', ['products' => $products]);
    }

    public function create()
    {
    	return view('products.create');
    }
    
    public function createSubmit(Request $request)
    {
        $image = $request->file('picture');
        $path = $image->move('images', $image->getClientOriginalName());

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'purchase_price' => $request->purchase_price,
            'sales_price' => $request->sales_price,
            'picture' => $path
        ]);
        
        return redirect('/product');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
    	return view('products.edit', ['product' => $product]);
    }
    
    public function editSubmit(Request $request)
    {
        $image = $request->file('picture');
        $path = $image->move('images', $image->getClientOriginalName());

        Product::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'purchase_price' => $request->purchase_price,
                'sales_price' => $request->sales_price,
                'picture' => $path
            ]);
        
        return redirect('/product');
    }

    public function delete(Request $request, $id)
    {
        Product::destroy($id);
        return redirect('/product');
    }
}
