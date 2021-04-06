<?php

namespace App\Http\Controllers\User;

use App\Cart;
use App\Country;
use App\CountryArea;
use App\DeliveryState;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CartStoreRequest;
use App\Http\Requests\User\CartUpdateRequest;
use App\Product;
use App\User;
use CreateCountriesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        // dd($carts);
        $carts = session()->get('cart');
        $country = Country::all();
        $countryArea = DeliveryState::all();

        if(!$carts){
            abort(404);
        }
        // dd($carts);
        return view('user.cart',compact('carts','country','countryArea'));

        
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
    public function store(Request $request, Product $id)
    {
        
        // dd($id);
        // $productadded = Product::whereid($id);

        // $request->session()->put('prod', 'id');
        // $value = $request->session()->get('prod');
        // return redirect()->route('user.login');
       
        // $request->validated();
        // $cart = Cart::create($request->validated());

        // $request->session()->flash('success', 'You have created successfully');
        // session('success');

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) //, Cart $cart
    {
        return view('user.cart');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cart $cart,$quantity)
    {
        dd($quantity);
        if($cart->id and $quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }//update database
   
        $cart->update([
            'product_qty' =>$quantity,
        ]);
        
        return view('user.cart.edit', compact('cart'));
    }

    /**
     * @param \App\Http\Requests\User\CartUpdateRequest $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function updatecart(Request $request, Cart $cart)
    {
        dd($request->product_qty);
            $cart->update(['product_qty'=>$request->product_qty]);
            
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->product_qty;
            session()->put('cart', $cart);
            
            session()->flash('success', 'Cart updated successfully');
        

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

    public function addtocart($id)
    { 
        if(Auth::check()){
            //add prod data and usr id to cart db
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_qty' => +1,
                'variance_id' => 1, //need to change
            ]);
        }else{
            dd(Auth::user());
            return redirect(route('user.login'));
        }
        
        $product = Product::whereid($id)->first();
        if(!$product) {
            abort(404);
        }
        
        $cart = session()->get('cart');

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

           
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "descr" => $product->description
                    ]
            ];
        }else{
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "descr" => $product->description
            ];
        }

        session()->put('cart', $cart);

        if(Auth::check()){
            //add prod data and usr id to cart db
            Cart::create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_qty' => $product->quantity,
                'user_id' => Auth::user()->id,
                'variance_id' => 1, //need to change
            ]);
        }else{
            dd(Auth::user());
            return redirect(route('user.login'));
        }
        Cart::create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'product_qty' => $product->quantity,
                    'user_id' => Auth::user()->id,
                    'variance_id' => 1, //need to change
                ]);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

}
