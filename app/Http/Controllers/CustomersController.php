<?php

namespace App\Http\Controllers;
use App\Models\customers;
use App\Models\Sovga;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=customers::all();
        return view('admin.customer.index',['customer'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer=customers::all();
        return redirect('admins.customer.create',['customer'=>$customer]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'description' => 'required',
            'debt'=>'required',
            'status' => 'required'
        ]);
        customers::create($request->all());
        return redirect()->back()->with('message','Muvafaqqiyatli saqlandi');
    }

    /**
     * Display the specified resource.
     */
    public function show(customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customers $customers,$id)
    {
//        $customers=customers::all();
//        return redirect('admins.update',['customers'=>$customers]);
        $customers = customers::where('id',$id)->first();
        return view('admins.update',['customer'=>$customers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customers $customers):RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'description' => 'required',
            'debt'=>'required',
            "status" => 'required'
        ]);
        $customers->update([
            $customers->name = $request->name,
            $customers->address = $request->address,
            $customers->phone = $request->phone,
            $customers->description = $request->description,
            $customers->debt = $request->debt,
            $customers->status = $request->status,
            $customers->save(),
        ]);
        return redirect('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        customers::destroy($id);
        return redirect()->back()->with('message','Muvafaqqiyatli o`chirildi');

    }
}
