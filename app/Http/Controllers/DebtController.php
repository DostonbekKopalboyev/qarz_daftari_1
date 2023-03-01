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
        $debts = DB::select("SELECT debts.id, debts.costumer_id, debts.user_id,
       debts.product, debts.quantity, debts.end_day, debts.created_at, debts.status,
       costumers.name as cname, users.name as uname from debts
           INNER JOIN costumers on debts.costumer_id =costumers.id
           INNER JOIN users on debts.user_id =users.id;");
        $users = User::all();
        $costumers = Costumer::all();
        return view('admin.debt', ['debts'=>$debts, 'users'=>$users, 'costumers'=>$costumers]);
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
           'product' => 'required',
           'quantity' => 'required',
           'end_day' => 'required'
        ]);

        $debt = Debt::create($request->all());
        $costumer_id = $request->costumer_id;
        $costumer = Costumer::where('id',$costumer_id)->first();
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
