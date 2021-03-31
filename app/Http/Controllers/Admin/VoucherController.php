<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VoucherStoreRequest;
use App\Http\Requests\Admin\VoucherUpdateRequest;
use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vouchers = Voucher::all();

        return view('admin.voucher.index', compact('vouchers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.voucher.create');
    }

    /**
     * @param \App\Http\Requests\Admin\VoucherStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherStoreRequest $request)
    {
        $voucher = Voucher::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('admin.voucher.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Voucher $voucher)
    {
        return view('admin.voucher.show', compact('voucher'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Voucher $voucher)
    {
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * @param \App\Http\Requests\Admin\VoucherUpdateRequest $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherUpdateRequest $request, Voucher $voucher)
    {
        $voucher->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('admin.voucher.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Voucher $voucher)
    {
        $voucher->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('admin.voucher.index');
    }
}
