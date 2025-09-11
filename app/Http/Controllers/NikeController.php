<?php

namespace App\Http\Controllers;

use App\Models\nike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class nikeController extends Controller
{
    public function indexm()
{
    // Show first page (6 products)
    $products = nike::orderBy('created_at', 'desc')->paginate(3);

    return view('nike.front', ['products' => $products]);
}

public function index(Request $request)
{
    $search = $request->query('search');

    $query = nike::query();

    if (!empty($search)) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%");
        });
    }

    $products = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

    return view('nike.indexn', compact('products', 'search'));
}

   public function loadMore(Request $request)
{
    if ($request->ajax()) {
        $page = $request->input('page', 1);
        $products = nike::orderBy('created_at', 'desc')->paginate(3, ['*'], 'page', $page);

        $view = view('nike.partials.product_cards', compact('products'))->render();

        return response()->json([
            'html' => $view,
            'hasMorePages' => $products->hasMorePages()
        ]);
    }
}
    public function create()
    {
        return view('nike.createn');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('nike.createn')->withErrors($validator)->withInput();
        }

        $product = new nike();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('nike.indexn')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $product = nike::findOrFail($id);
        return view('nike.editn', ['product' => $product]);
    }

    public function update($id, Request $request)
    {
        $product = nike::findOrFail($id);
        $oldImage = $product->image;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('nike.editn', $id)->withErrors($validator)->withInput();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            if ($oldImage && File::exists(public_path('images/' . $oldImage))) {
                File::delete(public_path('images/' . $oldImage));
            }

            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('nike.indexn')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $product = nike::findOrFail($id);

        if ($product->image && File::exists(public_path('images/' . $product->image))) {
            File::delete(public_path('images/' . $product->image));
        }

        $product->delete();

        return redirect()->route('nike.indexn')->with('success', 'Item deleted successfully.');
    }
}