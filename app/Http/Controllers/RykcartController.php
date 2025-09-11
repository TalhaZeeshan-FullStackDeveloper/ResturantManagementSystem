<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nike;
use App\Models\RykCart;

class RykCartController extends Controller
{
    /**
     * Items per page (single source of truth)
     */
    private int $perPage = 2;

    public function store(Request $request)
    {
        $product = Nike::findOrFail($request->product_id);

        $cartItem = RykCart::where('product_id', $product->id)->first();

        if ($cartItem) {
            // Product already in cart → just increase quantity
            $cartItem->increment('quantity');
        } else {
            // New row
            RykCart::create([
                'product_id'   => $product->id,
                'product_name' => $product->name,
                'category'     => $product->category,
                'image'        => $product->image,
                'price'        => $product->price,
                'quantity'     => 1,
            ]);
        }

        // After add: go to the LAST page so user sees the newly added item.
        // We sort ASC so newest IDs end up on the last page.
        $lastPage = RykCart::orderBy('id', 'asc')->paginate($this->perPage)->lastPage();
        if ($lastPage < 1) $lastPage = 1;

        return redirect()
            ->route('cart.index', ['page' => $lastPage])
            ->with('success', 'Product added to cart!');
    }

    public function index(Request $request)
{
    $search = $request->query('search');

    $query = RykCart::orderBy('id', 'asc');

    if (!empty($search)) {
        $query->where('product_name', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%");
    }

    $carts = $query->paginate($this->perPage);

    if ($request->ajax()) {
        return view('cart_table', compact('carts'))->render();
    }

    return view('ryk', compact('carts', 'search'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required','integer','min:1']
        ]);

        $cartItem = RykCart::findOrFail($id);
        $cartItem->update(['quantity' => (int)$request->quantity]);

        // back() preserves current ?page so user stays on same page
        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function destroy(Request $request, $id)
    {
        RykCart::destroy($id);

        // Keep user on a valid page after delete
        $currentPage = (int)$request->input('current_page', 1);
        $lastPage = RykCart::orderBy('id', 'asc')->paginate($this->perPage)->lastPage();
        if ($lastPage < 1) $lastPage = 1;

        if ($currentPage > $lastPage) {
            $currentPage = $lastPage;
        }

        return redirect()
            ->route('cart.index', ['page' => $currentPage])
            ->with('success', 'Item removed.');
    }
}