<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationStoreRequest;
use App\Http\Requests\Admin\NotificationUpdateRequest;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notifications = Notification::all();

        return view('admin.notification.index', compact('notifications'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.notification.create');
    }

    /**
     * @param \App\Http\Requests\Admin\NotificationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate();
        $notification = Notification::create($request->validated());

        $request->session()->flash('success', "You created successfully");
        session('success');
        return redirect()->route('admin.notification.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Notification $notification)
    {
        return view('admin.notification.show', compact('notification'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Notification $notification)
    {
        return view('admin.notification.edit', compact('notification'));
    }

    /**
     * @param \App\Http\Requests\Admin\NotificationUpdateRequest $request
     * @param \App\Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->validated());

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.notification.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Notification $notification)
    {
        $notification->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.notification.index');
    }
}
