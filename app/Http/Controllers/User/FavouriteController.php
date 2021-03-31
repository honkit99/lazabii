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

        return view('user.favourite.index', compact('favourites'));
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
    public function store(FavouriteStoreRequest $request)
    {
        $favourite = Favourite::create($request->validated());

        $request->session()->flash('success', $success);

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
    public function update(FavouriteUpdateRequest $request, Favourite $favourite)
    {
        $favourite->update($request->validated());

        $request->session()->flash('success', $success);

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

        $request->session()->flash('success', $success);

        return redirect()->route('user.favourite.index');
    }
}
