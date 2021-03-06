<?php

namespace App\Http\Controllers\Admin;

use App\Langauge;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageStoreRequest;
use App\Http\Requests\Admin\LanguageUpdateRequest;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $languages = Langauge::all();

        return view('admin.language.index', compact('languages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.language.create');
    }

    /**
     * @param \App\Http\Requests\Admin\LanguageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate();
        $language = Langauge::create($request->validated());

        $request->session()->flash('success', "You created successfully");
        session('success');
        return redirect()->route('admin.language.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\language $language
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Langauge $language)
    {
        return view('admin.language.show', compact('language'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\language $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Langauge $language)
    {
        return view('admin.language.edit', compact('language'));
    }

    /**
     * @param \App\Http\Requests\Admin\LanguageUpdateRequest $request
     * @param \App\Admin\language $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Langauge $language)
    {
        $language->update($request->validated());

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.language.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\language $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Langauge $language)
    {
        $language->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.language.index');
    }
}
