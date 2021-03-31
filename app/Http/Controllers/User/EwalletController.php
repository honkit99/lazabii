<?php

namespace App\Http\Controllers\User;

use App\Ewallet;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EwalletStoreRequest;
use App\Http\Requests\User\EwalletUpdateRequest;
use Illuminate\Http\Request;

class EwalletController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ewallets = Ewallet::all();

        return view('user.ewallet.index', compact('ewallets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.ewallet.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Ewallet $ewallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Ewallet $ewallet)
    {
        return view('user.address.edit', compact('ewallet'));
    }

    /**
     * @param \App\Http\Requests\User\EwalletStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EwalletStoreRequest $request)
    {
        $ewallet = Ewallet::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.ewallet.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Ewallet $ewallet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ewallet $ewallet)
    {
        return view('user.ewallet.show', compact('ewallet'));
    }

    /**
     * @param \App\Http\Requests\User\EwalletUpdateRequest $request
     * @param \App\Ewallet $ewallet
     * @return \Illuminate\Http\Response
     */
    public function update(EwalletUpdateRequest $request, Ewallet $ewallet)
    {
        $ewallet->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.ewallet.index');
    }
}
