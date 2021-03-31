<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\User\User;
use App\User\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();

        return view('user.user.index', compact('users'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.user.create');
    }

    /**
     * @param \App\Http\Requests\User\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.user.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\user $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return view('user.user.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\user $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        return view('user.user.edit', compact('user'));
    }

    /**
     * @param \App\Http\Requests\User\UserUpdateRequest $request
     * @param \App\User\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.user.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('user.user.index');
    }
}
