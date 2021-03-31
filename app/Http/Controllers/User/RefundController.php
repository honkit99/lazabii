<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RefundStoreRequest;
use App\Http\Requests\User\RefundUpdateRequest;
use App\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $refunds = Refund::all();

        return view('user.refund.index', compact('refunds'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.refund.create');
    }

    /**
     * @param \App\Http\Requests\User\RefundStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $refund = Refund::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('user.refund.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Refund $refund)
    {
        return view('user.refund.show', compact('refund'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Refund $refund)
    {
        return view('user.refund.edit', compact('refund'));
    }

    /**
     * @param \App\Http\Requests\User\RefundUpdateRequest $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        $request->validated();
        $refund->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');
        session('success');

        return redirect()->route('user.refund.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Refund $refund)
    {
        $refund->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('user.refund.index');
    }
}
