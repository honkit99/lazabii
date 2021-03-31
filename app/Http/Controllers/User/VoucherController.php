<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VoucherStoreRequest;
use App\Http\Requests\Admin\VoucherUpdateRequest;
use App\Http\Requests\User\VoucherStoreRequest;
use App\Http\Requests\User\VoucherUpdateRequest;
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

        return view('user.voucher.index', compact('vouchers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.voucher.create');
    }

    /**
     * @param \App\Http\Requests\User\VoucherStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherStoreRequest $request)
    {
        $voucher = Voucher::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.voucher.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Voucher $voucher)
    {
        return view('user.voucher.show', compact('voucher'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Voucher $voucher)
    {
        return view('user.voucher.edit', compact('voucher'));
    }

    /**
     * @param \App\Http\Requests\User\VoucherUpdateRequest $request
     * @param \App\Voucher $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherUpdateRequest $request, Voucher $voucher)
    {
        $voucher->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.voucher.index');
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

        return redirect()->route('user.voucher.index');
    }
}
