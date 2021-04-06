<?php

namespace App\Http\Controllers\User;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderStoreRequest;
use App\Http\Requests\User\OrderUpdateRequest;
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
        $country = Country::all();

        return view('user.order', compact('orders','country'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.order.create');
    }

    /**
     * @param \App\Http\Requests\User\OrderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $order = Order::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('user.order.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order)
    {
        return view('user.order.show', compact('order'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Order $order)
    {
        return view('user.order.edit', compact('order'));
    }

    /**
     * @param \App\Http\Requests\User\OrderUpdateRequest $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validated();
        $order->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');
        session('success');

        return redirect()->route('user.order.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        $order->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('user.order.index');
    }
}
