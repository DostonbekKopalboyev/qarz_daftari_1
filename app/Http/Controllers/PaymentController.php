<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        $costumers = Costumer::all();
        $users = User::all();
        return view('admin.payment', ['payments' => $payments, 'costumers' => $costumers, 'users' => $users]);
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
            'quantity' => 'required',
        ]);

        $payment = $request->all();
        $payment['user_id']=auth()->user()->id;
        $costumer_id = $request->costumer_id;
        $costumer = Costumer::where('id',$costumer_id)->first();
        $costumer->debt-=intval($request->quantity);
        $costumer->save();
        Payment::create($payment);

        return redirect()->back()->with('success', 'Muvaffaqqiyatli qo\'shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
