<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\City;
use App\Country;
use App\DeliveryCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderStoreRequest;
use App\Http\Requests\User\OrderUpdateRequest;
use App\Order;
use App\Postcode;
use App\State;
use App\User;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $state = State::all();
        $city = City::all();
        $postcode = Postcode::all();
        $delivery = DeliveryCompany::all();

        return view('user.order', compact('orders','country','state','city','postcode','delivery'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.order.create');
    }

    /**
     * @param \App\Http\Requests\User\OrderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $total = 0;
        $delivery = DeliveryCompany::where('id',$request->delivery)->first();
        $request->session()->flash('success', 'You have created successfully');
        session('success');

        foreach($carts as $key => $cart){
            $total  += $cart->product_qty* $cart->product_price;
        };

        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'address'=> 'required',
            'country'=> 'required',
            'state'=> 'required',
            'city'=> 'required',
            'postcode'=> 'required',
            'phone'=> 'required',
            'delivery'=> 'required',
        ],[],[]);
            Order::create([
                'user_id' => Auth::user()->id,
                'receiver_name' => $request->name,
                'receiver_email' => $request->email,
                'country_id' => $request->country,
                'address' => $request->address,
                'state_id' => $request->state,
                'city_id' => $request->city,
                'postcode_id' => $request->postcode,
                'receiver_contact' => $request->phone,
                'delivery_company_id' => $request->delivery,
                'delivery_company_name' => $delivery->name,
                'total_amount'=>$total,
                'status' => 2 ,
                'payment_status'=> 2,
                'delivery_status'=> 0,
            ]);
        return redirect()->route('user.ordersuccess');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $user = Auth::user()->id;
        $histories = Order::whereuser_id($user)->get();
        return view('user.orderhistory', compact('histories'));
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
