<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $todos = Admin::all();//select all

        return view('admin.home', compact('admin'));

        //compact means

        /*return view('todo.index', [
            'todos' => 'todos';
        ]);*/ 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Admin $admin)
    {
        return view('admin.profile', compact('admin'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'dob' =>  ['required'],
            'phone' => ['required','min:10'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_data = Admin::find($id);
        $this->save($admin_data, $request);

        return redirect()->route('admin.home');
    }

    private function save(Admin $admin_data, Request $request){
        $profile = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:admins,email,'.$admin_data->id,
            'gender' => 'required|integer',
            'phone' => 'required',
            'dob' => 'required|date',
        ]);

        $admin_data->update($profile);

        $request->session()->flash('success', "You updated successfully");
        session("success");
    }
}
