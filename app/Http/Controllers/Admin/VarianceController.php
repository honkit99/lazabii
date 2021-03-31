<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VarianceStoreRequest;
use App\Http\Requests\Admin\VarianceUpdateRequest;
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

        return view('admin.variance.index', compact('variances'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.variance.create');
    }

    /**
     * @param \App\Http\Requests\Admin\VarianceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate();
        $variance = Variance::create($request->validated());

        $request->session()->flash('success', "You created successfully");
        session('success');
        return redirect()->route('admin.variance.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Variance $variance)
    {
        return view('admin.variance.show', compact('variance'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Variance $variance)
    {
        return view('admin.variance.edit', compact('variance'));
    }

    /**
     * @param \App\Http\Requests\Admin\VarianceUpdateRequest $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variance $variance)
    {
        $variance->update($request->validated());

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.variance.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Variance $variance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Variance $variance)
    {
        $variance->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.variance.index');
    }
}
