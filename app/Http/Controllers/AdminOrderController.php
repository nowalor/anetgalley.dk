<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query()->with('invoice', 'product');

        if($request->query('filter') === 'completed') {
            $orders->whereNotNull('completed_at');
        } else {
            $orders->whereNull('completed_at');
        }

        $orders = $orders->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('invoice', 'product');

        return view('admin.orders.show', compact('order'));
    }

    public function update(Order $order)
    {
        $order->update([
            'completed_at' => now(),
        ]);

        return redirect()->back()->with('order-completed', 'Order has been set as complete');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->back()->with('order-deleted', 'Order has been deleted');
    }
}
