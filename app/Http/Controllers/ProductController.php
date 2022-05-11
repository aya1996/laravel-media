<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('addProduct')
            ->with('products',  Product::orderBy('id', 'DESC')->get());
    }

    public function store(Request $request)
    {
        

        $this->validate($request, [

            'name' => 'required|string|max:255',
            'description' => 'required|string|max:855',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        if ($request->hasfile('filename')) {

            foreach ($request->file('filename') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $data[] = $name;
            }
        }

        $image = new Image();
        $image->url = json_encode($data);
        $image->product_id = $product->id;

        $image->save();

        return back()->with('success', 'Your images has been successfully');
    }
}
