<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        $todos = User::all();//select all

        return view('user.home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_data = User::find($id);
        // $this->save($user_data, $request);
        $encypt_password = Hash::check($request->current_password, $user_data->password);

        //dd($encypt_password);

        if($request->current_password == null){
            $this->save($user_data, $request);

            return redirect()->route('user.home');
        }
        else if($encypt_password){
            $this->passwordSave($user_data, $request);

            return redirect()->route('user.home');
        }
        else if(!$encypt_password){
            $validator = Validator::make([], []);
            $validator->errors()->add('current_password', "Wrong password");

            throw new ValidationException($validator);

            return redirect()->route('user.profile.edit');
        }
    }

    private function passwordSave(User $user_data, Request $request){
        $profile = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email,'.$user_data->id,
            'gender' => 'required|integer',
            'phone' => 'required',
            'dob' => 'required|date',
            'password' => 'required',
            'comfirm_password' => 'required|same:password',
        ]);

        $profile['password'] = Hash::make($profile['password']);

        $user_data->update($profile);

        $request->session()->flash('success', "You updated successfully");
        session("success");
    }

    private function save(User $user_data, Request $request){
        $profile = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email,'.$user_data->id,
            'gender' => 'required|integer',
            'phone' => 'required',
            'dob' => 'required|date',
        ]);

        $user_data->update($profile);

        $request->session()->flash('success', "You updated successfully");
        session("success");
    }
}
