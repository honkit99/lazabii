<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$orders = Order::all();
        $orders = Order::with('user', 'product')->get();
        $x = 0;

        return view('admin.order.index', compact('orders', 'x'));
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
    public function store(Request $request)
    {
        $request->validate();
        $order = Order::create($request->validated());

        $request->session()->flash('success', "You created successfully");
        session('success');
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
    public function update(Request $request, Order $order)
    {
        $valid = $request->validate([
            // 'customer'                => 'required|string|exists:users,name',
            // 'product'                 => 'required|string|exists:products,name',
            // 'delivery_company_name'   => 'required|string',
            'delivery_status'         => 'required|integer',
            //'total_payment_amount'    => 'required|decimal',
            'payment_status'          => 'required|integer',
            // 'address'                 => 'required|text',
            // 'transaction_id'          => 'required|integer',
        ]);

        //dd($valid);

        $order->update($valid);

        $request->session()->flash('success', "You updated successfully");
        session('success');

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

        $request->session()->flash('success', "You deleted successfully");
        session('success');

        return redirect()->route('admin.order.index');
    }
}
