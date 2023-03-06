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
        //Jami xaridorlarda sotuvchining qancha miqdordagi puli yotibdi, shuni ko'rsatadi
        $costumers = Costumer::all()->sum('debt');


        $payments = Payment::all();
        $debts = Debt::all();
        $today = date("Y-m-d");
        $total_debts = 0;
        $total_payments = 0;
        $beginningOfDay = $today . " 00:00:00";
        $endOfDay = $today . " 23:59:59";

//Bugun qancha xaridor sotuvchidan qancha miqdorda qarz olib ketti, shuni ko'rsatadi
        foreach ($debts as $debt){
            if($beginningOfDay <= $debt['created_at'] and $endOfDay >= $debt['created_at']){
                $total_debts += $debt->quantity;
            }
        }
        $today_debts_show = $total_debts;
//        dd($today_debts_show);

//Bugun qancha xaridor sotuvchiga qancha miqdorda qarzini uzib ketti, shuni ko'rsatadi
        foreach ($payments as $payment){
            if($beginningOfDay <= $payment['created_at'] and $endOfDay >= $payment['created_at']){
                $total_payments += $payment->quantity;
            }
        }
        $total_payments_show = $total_payments;
//        dd($total_payments_show);


        return view('admin.statistics', ['costumers' => $costumers, 'debts' => $debts, 'payments' => $payments, 'today_debts_show' => $today_debts_show, 'total_payments_show' => $total_payments_show]);
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
