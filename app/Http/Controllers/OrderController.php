<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(5);
        $orderCount = $orders->total();
        return view('admin.order.index', compact('orders', 'orderCount'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('orderItems');

        return view('admin.order.detail', compact('order'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}