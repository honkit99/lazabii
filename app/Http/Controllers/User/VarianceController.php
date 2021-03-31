<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VarianceStoreRequest;
use App\Http\Requests\Admin\VarianceUpdateRequest;
use App\Http\Requests\User\VarianceStoreRequest;
use App\Http\Requests\User\VarianceUpdateRequest;
use App\Variance;
use Illuminate\Http\Request;

class VarianceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $variances = Variance::all();

        return view('user.variance.index', compact('variances'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.variance.create');
    }

    /**
     * @param \App\Http\Requests\User\VarianceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VarianceStoreRequest $request)
    {
        $variance = Variance::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.variance.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Variance $variance)
    {
        return view('user.variance.show', compact('variance'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Variance $variance)
    {
        return view('user.variance.edit', compact('variance'));
    }

    /**
     * @param \App\Http\Requests\User\VarianceUpdateRequest $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function update(VarianceUpdateRequest $request, Variance $variance)
    {
        $variance->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.variance.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Variance $variance)
    {
        $variance->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('user.variance.index');
    }
}
