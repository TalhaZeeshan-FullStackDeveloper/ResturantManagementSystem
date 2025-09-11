<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\RykCart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    // Show all orders
public function index()
{
    $orders = Order::latest()->get();
    return view('orders.index', compact('orders'));
}

    // Show the order form
    public function create()
    {
        $carts = RykCart::all();
        return view('orders.form', compact('carts'));
    }

    // Place the order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
        ]);

        $cartItems = RykCart::all();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();

        try {
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $order = Order::create([
                'customer_name'  => $request->customer_name,
                'customer_email' => $request->customer_email,
                'total_price'    => $totalPrice,
                'status'         => 'pending',
            ]);

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id'      => $order->id,
                    'product_id'    => $cartItem->product_id,
                    'product_name'  => $cartItem->product_name,
                    'category'      => $cartItem->category,
                    'image'         => $cartItem->image,
                    'price'         => $cartItem->price,
                    'quantity'      => $cartItem->quantity,
                ]);
            }

            RykCart::truncate();
            DB::commit();

            return redirect()->route('order.show', $order->id)
                             ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Order placement failed. Try again.');
        }
    }

    // Show the order details
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Delete order
public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')
                     ->with('success', 'Order deleted successfully!');
}



// Update order status
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
    ]);

    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->route('orders.index')->with('success', 'Order status updated!');
}


// Show tracking form
public function track()
    {
        return view('orders.track');
    }

    public function trackResult(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string',
        'customer_email' => 'required|email',
    ]);

    $query = Order::query();

    if ($request->filled('order_id')) {
        $query->where('id', $request->order_id);
    }

    $query->where('customer_name', 'LIKE', '%' . $request->customer_name . '%')
          ->where('customer_email', $request->customer_email);

    $orders = $query->get();

    return view('orders.track_result', compact('orders'));
}



}