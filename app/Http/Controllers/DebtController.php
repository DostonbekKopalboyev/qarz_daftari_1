<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Debt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = Debt::all();
        $costumers = Costumer::all();
        return view('admin.debt', ['debts'=>$debts,'costumers'=>$costumers]);
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
    public function store(Request $request)
    {
        $request->validate([
           'costumer_id' => 'required',
           'product' => 'required',
           'quantity' => 'required',
           'end_day' => 'required'
        ]);
        $debt = $request->all();
        $debt['user_id']=auth()->user()->id;
        Debt::create($debt);
        $costumer_id = $request->costumer_id;
        $costumer = Costumer::find('id',$costumer_id)->first();
        $costumer->debt+=intval($request->quantity);
        $costumer->save();
        return redirect()->back()->with('success', 'Muvaffaqqiyatli qo\'shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debt $debt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Debt $debt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        //
    }
}
