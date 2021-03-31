<?php

namespace App\Http\Controllers\Admin;

use App\DeliveryCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryCompanyStoreRequest;
use App\Http\Requests\Admin\DeliveryCompanyUpdateRequest;
use Illuminate\Http\Request;

class DeliveryCompanyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $deliveryCompanys = DeliveryCompany::all();

        return view('admin.delivery_company.index', compact('delivery_companys'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.delivery_company.create');
    }

    /**
     * @param \App\Http\Requests\Admin\DeliveryCompanyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate();
        $deliveryCompany = DeliveryCompany::create($request->validated());

        $request->session()->flash('success', "You created successfully");
        session('success');
        return redirect()->route('admin.delivery_company.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\DeliveryCompany $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DeliveryCompany $deliveryCompany)
    {
        return view('admin.delivery_company.show', compact('delivery_company'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\DeliveryCompany $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DeliveryCompany $deliveryCompany)
    {
        return view('admin.delivery_company.edit', compact('delivery_company'));
    }

    /**
     * @param \App\Http\Requests\Admin\DeliveryCompanyUpdateRequest $request
     * @param \App\DeliveryCompany $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryCompany $deliveryCompany)
    {
        $deliveryCompany->update($request->validated());

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.delivery_company.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\DeliveryCompany $deliveryCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DeliveryCompany $deliveryCompany)
    {
        $deliveryCompany->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.delivery_company.index');
    }
}
