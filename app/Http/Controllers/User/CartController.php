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
    public function index(Request $request)
    {
        $carts = Cart::all();

        return view('user.cart.index', compact('carts'));
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
    public function store(CartStoreRequest $request)
    {
        $cart = Cart::create($request->validated());

        $request->session()->flash('success', $success);

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
    public function update(CartUpdateRequest $request, Cart $cart)
    {
        $cart->update($request->validated());

        $request->session()->flash('success', $success);

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

        $request->session()->flash('success', $success);

        return redirect()->route('user.cart.index');
    }
}
