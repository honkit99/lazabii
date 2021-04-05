<?php

namespace App\Http\Controllers\User;

use App\Favourite;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FavouriteStoreRequest;
use App\Http\Requests\User\FavouriteUpdateRequest;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $favourites = Favourite::all();

        return view('user.favourite', compact('favourites'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.favourite.create');
    }

    /**
     * @param \App\Http\Requests\User\FavouriteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $favourite = Favourite::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('user.favourite.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Favourite $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Favourite $favourite)
    {
        return view('user.favourite.show', compact('favourite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Favourite $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Favourite $favourite)
    {
        return view('user.favourite.edit', compact('favourite'));
    }

    /**
     * @param \App\Http\Requests\User\FavouriteUpdateRequest $request
     * @param \App\Favourite $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        $request->validated();
        $favourite->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');
        session('success');

        return redirect()->route('user.favourite.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Favourite $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Favourite $favourite)
    {
        $favourite->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('user.favourite.index');
    }
}
