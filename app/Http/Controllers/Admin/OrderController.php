<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderStoreRequest;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::all();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.order.create');
    }

    /**
     * @param \App\Http\Requests\Admin\OrderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $order = Order::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('admin.order.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    /**
     * @param \App\Http\Requests\Admin\OrderUpdateRequest $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('admin.order.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        $order->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('admin.order.index');
    }
}
