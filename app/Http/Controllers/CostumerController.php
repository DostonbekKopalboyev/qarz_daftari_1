<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Debt;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumers = Costumer::all();
//        $info = Debt::all()->sortByDesc('created_at');
//        $info = Payment::all()->sortByDesc('created_at');
//        dd($info);
        return view('admin.costumer', ['costumers' => $costumers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        Costumer::create($request->all());
        return redirect()->back()->with('status', 'Muvaffaqqiyatli qo\'shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costumer $costumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costumer $costumer):RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $costumer = Costumer::find($request->id);
        $costumer->name = $request->name;
        $costumer->phone = $request->phone;
        $costumer->address = $request->address;
        $costumer->description = $request->description;
        $costumer->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Costumer::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Muvaffaqqiyatli o\'chirildi');
    }
}
