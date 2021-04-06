<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\User;
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

        return view('admin.auth.userlist', compact('users'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.auth.adduser');
    }

    /**
     * @param \App\Http\Requests\User\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email',
            'gender'=> 'required',
            'phone'=> 'required',
            'dob'=> 'required',

        ],[
            'name.required'=>'Please fill in the name',
            'unique'=>'This email already taken',
        ],[
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'password' => $request->password,
            ]);
        return redirect()->route('admin.users.index');
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
        return view('admin.auth.useredit', compact('user'));
    }

    /**
     * @param \App\Http\Requests\User\UserUpdateRequest $request
     * @param \App\User\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated=$request->validate([
            'name' => 'required',
            'email'=> 'required',
            'gender'=> 'required',
            'phone'=> 'required',
            'dob'=> 'required',

        ],[
            'name.required'=>'Please fill in the name',
        ],[
            ]);
         $user->update($validated);

        return redirect()->route('admin.users.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User\user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('admin.users.index');
    }
}
