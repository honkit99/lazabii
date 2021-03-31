<?php

namespace App\Http\Controllers;

use App\Http\Requests\logStoreRequest;
use App\Http\Requests\logUpdateRequest;
use App\Log;
use Illuminate\Http\Request;

class logController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logs = Log::all();

        return view('admin.log.index', compact('logs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.log.create');
    }

    /**
     * @param \App\Http\Requests\logStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $log = Log::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('admin');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Log $log
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, log $log)
    {
        return view('admin', compact('how with log'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Log $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, log $log)
    {
        return view('admin', compact('dit with log'));
    }

    /**
     * @param \App\Http\Requests\logUpdateRequest $request
     * @param \App\Log $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, log $log)
    {
        $request->validated();
        $log->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');
        session('success');

        return redirect()->route('admin');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Log $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, log $log)
    {
        $log->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('admin');
    }
}
