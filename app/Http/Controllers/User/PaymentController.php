<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payments = Payment::all();

        return view('user.payment.index', compact('payments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.payment.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('user.payment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Payment $payment)
    {
        return view('user.payment.show', compact('payment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Payment $payment)
    {
        return view('user.payment.edit', compact('payment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        return redirect()->route('user.payment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Payment $payment)
    {
        return redirect()->route('user.payment.index');
    }
}
