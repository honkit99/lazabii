<?php

namespace App\Http\Controllers\User;

use App\Langauge;
use App\Http\Controllers\Controller;
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

        return view('user.language.index', compact('languages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.language.create');
    }

    /**
     * @param \App\Http\Requests\User\LanguageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $language = Langauge::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('user.language.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\language $language
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Langauge $language)
    {
        return view('user.language.show', compact('language'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\language $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Langauge $language)
    {
        return view('user.language.edit', compact('language'));
    }

    /**
     * @param \App\Http\Requests\User\LanguageUpdateRequest $request
     * @param \App\User\language $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Langauge $language)
    {
        $request->validated();
        $language->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');
        session('success');

        return redirect()->route('user.language.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\language $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Langauge $language)
    {
        $language->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('user.language.index');
    }
}
