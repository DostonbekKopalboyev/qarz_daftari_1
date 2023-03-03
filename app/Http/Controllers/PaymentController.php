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
        $payments = DB::select("SELECT payments.id, payments.costumer_id, payments.user_id,
            payments.quantity, payments.created_at,
            costumers.name as cname, users.name as uname from payments
           INNER JOIN costumers on payments.costumer_id =costumers.id
           INNER JOIN users on payments.user_id =users.id;");
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
            'user_id' => 'required',
            'quantity' => 'required',
        ]);

        Payment::create($request->all());
        $costumer_id = $request->costumer_id;
        $costumer = Costumer::where('id',$costumer_id)->first();
        $costumer->debt-=intval($request->quantity);
        $costumer->save();

        return redirect()->back();
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
