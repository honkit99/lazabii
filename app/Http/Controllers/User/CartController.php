<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CartStoreRequest;
use App\Http\Requests\User\CartUpdateRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::all();

        return view('user.cart');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.cart.create');
    }

    /**
     * @param \App\Http\Requests\User\CartStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $cart = Cart::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('user.cart.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cart $cart)
    {
        return view('user.cart.show', compact('cart'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cart $cart)
    {
        return view('user.cart.edit', compact('cart'));
    }

    /**
     * @param \App\Http\Requests\User\CartUpdateRequest $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validated();
        $cart->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');

        session('success');

        return redirect()->route('user.cart.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        $cart->delete();

        $request->session()->flash('success', 'You have deleted successfully');

        session('success');

        return redirect()->route('user.cart.index');
    }
}
