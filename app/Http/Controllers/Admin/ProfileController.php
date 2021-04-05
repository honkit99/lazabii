<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $todos = Admin::all();//select all

        return view('admin.home');

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_data = Admin::find($id);
        // $this->save($admin_data, $request);
        $encypt_password = Hash::check($request->current_password, $admin_data->password);

        //dd($encypt_password);

        if($request->current_password == null){
            $this->save($admin_data, $request);

            return redirect()->route('admin.home');
        }
        else if($encypt_password){
            $this->passwordSave($admin_data, $request);

            return redirect()->route('admin.home');
        }
        else if(!$encypt_password){
            return redirect()->route('admin.profile.index');
        }
    }

    private function passwordSave(Admin $admin_data, Request $request){
        $profile = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:admins,email,'.$admin_data->id,
            'gender' => 'required|integer',
            'phone' => 'required',
            'dob' => 'required|date',
            'password' => 'required',
            'comfirm_password' => 'required|same:password',
        ]);

        $profile['password'] = Hash::make($profile['password']);

        $admin_data->update($profile);

        $request->session()->flash('success', "You updated successfully");
        session("success");
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
