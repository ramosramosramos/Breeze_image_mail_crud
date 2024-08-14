<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers= Customer::all()->map(fn($customer)=>[

            'id'=>$customer->id,
            'name'=>$customer->name,
            'city'=>$customer->city,
            'image_path'=>$customer->image_path ? Storage::url($customer->image_path) : null
        ]);
        return inertia('AllowedPages/Customer',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('AllowedPages/Tools/CreateCustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
    $imagePath = 'null';
    if($request->hasFile('image')){
        $imagePath=$request->file('image')->store('public/customers');
    
    }
    Customer::create([
        'name'=>$request->name,
        'city'=>$request->city,
        'image_path'=>$imagePath,
    ]);
    return redirect()->route('customers.index')->with('created',"New customer has been added successfully! ");
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {

    return inertia('AllowedPages/Tools/EditCustomer',['customer'=>[

        'id'=>$customer->id,
        'name'=>$customer->name,
        'city'=>$customer->city,
        'image_path'=>$customer->image_path ? Storage::Url($customer->image_path):null,
    ]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $imagePath = $customer->image_path;
        if(Request::hasFile('image')){
            if($imagePath&&$imagePath!='null'){
                Storage::delete($imagePath);
            }
            $imagePath=$request->file('image')->store('public/customers');

        }
        $customer->update([
            'name'=>$request->name,
            'city'=>$request->city,
            'image_path'=>$imagePath,
        ]);
        return redirect()->route('customers.index')->with('updated','Customer '.$customer->id.' is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
    Storage::delete($customer->image_path);
    return redirect()->back()->with('deleted','Customer has been remove successfully');

    }
}
