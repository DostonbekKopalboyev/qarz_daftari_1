<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Debt;
use App\Models\Payment;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $costumers = DB::select("SELECT SUM(debt) AS DEBT FROM costumers;");
        $costumers = Costumer::all();
        $debts = Debt::all();
        $payments = Payment::all();
        return view('admin.statistics', ['costumers' => $costumers, 'debts' => $debts, 'payments' => $payments]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
//        $debt = $costumer->debt;
//        $costumers = Costumer::find('debt', $debt)->get();
//        $sum = array_sum($costumers);
//        dd($sum);

//        return redirect()->back();
//        foreach ($costumers as $costumer){

//        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}
