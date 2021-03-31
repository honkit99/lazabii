<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RefundStoreRequest;
use App\Http\Requests\Admin\RefundUpdateRequest;
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

        return view('admin.refund.index', compact('refunds'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.refund.create');
    }

    /**
     * @param \App\Http\Requests\Admin\RefundStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RefundStoreRequest $request)
    {
        $refund = Refund::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('admin', [$d.index]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Refund $refund)
    {
        return view('admin', compact('d.show with refund'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Refund $refund)
    {
        return view('admin', compact('d.edit with refund'));
    }

    /**
     * @param \App\Http\Requests\Admin\RefundUpdateRequest $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function update(RefundUpdateRequest $request, Refund $refund)
    {
        $refund->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('admin', [$d.index]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Refund $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Refund $refund)
    {
        $refund->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('admin', [$d.index]);
    }
}
