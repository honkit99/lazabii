<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::all();

        return view('admin.auth.adminlist', compact('admins'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.auth.addadmin');
    }

    /**
     * @param \App\Http\Requests\Admin\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:admins,email',
            'gender'=> 'required',
            'phone'=> 'required',
            'dob'=> 'required',

        ],[
            'name.required'=>'Please fill in the name',
            'unique'=>'This email already taken',
        ],[
            ]);
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'password' => $request->password,
            ]);
        $request->session()->flash('success', "You created successfully");
        session('success');
        return redirect()->route('admin.admins.index');      
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Admin $admin)
    {
        return view('admin.admin.show', compact('admin'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Admin $admin)
    {
        return view('admin.auth.adminedit', compact('admin'));
    }

    /**
     * @param \App\Http\Requests\Admin\AdminUpdateRequest $request
     * @param \App\Admin\admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
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
        $admin->update($validated);

        return redirect()->route('admin.admins.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Admin\admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Admin $admin)
    {
        $admin->delete();

        $request->session()->flash('success', "You deleted successfully");

        return redirect()->route('admin.admins.index');
    }
}
