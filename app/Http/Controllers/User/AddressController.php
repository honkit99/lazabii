<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddressStoreRequest;
use App\Http\Requests\User\AddressUpdateRequest;
use App\User\Addresss;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresss = Addresss::all();

        return view('user.address.index', compact('addresss'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.address.create');
    }

    /**
     * @param \App\Http\Requests\User\AddressStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressStoreRequest $request)
    {
        $address = Address::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.address.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Address $address)
    {
        return view('user.address.show', compact('address'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Address $address)
    {
        return view('user.address.edit', compact('address'));
    }

    /**
     * @param \App\Http\Requests\User\AddressUpdateRequest $request
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressUpdateRequest $request, Address $address)
    {
        $address->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.address.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Address $address)
    {
        $address->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('user.address.index');
    }
}
