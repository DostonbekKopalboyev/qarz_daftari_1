<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Debt;
use App\Models\Payment;
use App\Models\Statistic;
use Carbon\Carbon;
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

        $debts_costumers = Costumer::all()->take(7)->pluck('debt', 'name')->toArray();
        foreach($debts_costumers as $key=>$value) {
            $debts_costumers_key[] = $key;
            $debts_costumers_val[] = $value;
        }
//        dd($debts_costumers);

        $payments = Payment::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(6)->pluck('quantity','created_at')->toArray();
        //$payments_date = Payment::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->pluck('created_at')->toArray();
        foreach($payments as $key=>$value) {
            $payment_key[] = $key;
            $payment_val[] = $value;
        }
//        dd($payments);
        $debts = Debt::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(7)->pluck('quantity')->toArray();
        foreach ($debts as $key=>$value) {
            $debt_key = $key;
            $debt_value = $value;
        }

        $debts_quantity = Debt::whereDate('created_at', now())->get()->sum('quantity');
        $paymets_quantity = Payment::whereDate('created_at', now())->get()->sum('quantity');


//
//        $today = date("Y-m-d");
//        $total_debts = 0;
//        $total_payments = 0;
//        $beginningOfDay = $today . " 00:00:00";
//        $endOfDay = $today . " 23:59:59";

//Bugun qancha xaridor sotuvchidan qancha miqdorda qarz olib ketti, shuni ko'rsatadi
//        foreach ($debts as $debt){
//            if($beginningOfDay <= $debt['created_at'] and $endOfDay >= $debt['created_at']){
//                $total_debts += $debt->quantity;
//            }
//        }
//        $today_debts_show = $total_debts;
//        dd($today_debts_show);

//Bugun qancha xaridor sotuvchiga qancha miqdorda qarzini uzib ketti, shuni ko'rsatadi
//        foreach ($payments as $payment){
//            if($beginningOfDay <= $payment['created_at'] and $endOfDay >= $payment['created_at']){
//                $total_payments += $payment->quantity;
//            }
//        }
//        $total_payments_show = $total_payments;
//        dd($total_payments_show);


        return view('admin.statistics', [
            'costumers' => $costumers,
            'debts_quantity' => $debts_quantity,
            'paymets_quantity' => $paymets_quantity,
            'payment_key' => $payment_key,
            'payment_val'=>$payment_val,
            'debt_key' => $debt_key,
            'debt_value' => $debt_value,
            'debts_costumers_key' =>  $debts_costumers_key,
            'debts_costumers_val' => $debts_costumers_val
        ]);
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
