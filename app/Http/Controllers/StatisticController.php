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
        $payments = Payment::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(6)->pluck('quantity','created_at')->toArray();
        $debts = Debt::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(7)->pluck('quantity')->toArray();


        $debts_quantity = Debt::whereDate('created_at', now())->get()->sum('quantity');
        $paymets_quantity = Payment::whereDate('created_at', now())->get()->sum('quantity');

//        1haftalik payment va debt
        $week_statistic_debt =Debt::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(7)->pluck('quantity','created_at')->toArray();
        foreach($week_statistic_debt as $key=>$value) {
            $week_statistic_key[] = $key;
            $week_statistic_val[] = $value;
        }

        $week_statistic_payment =Payment::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(7)->pluck('quantity','created_at')->toArray();
  if(!isset($week_statistic_payment)){
        foreach($week_statistic_payment as $key=>$value) {
            $statistic_pay_key[] = $key;
            $statistic_pay_val[] = $value;
        }
  }


        return view('admin.statistics', [
            'costumers' => $costumers,
            'debts_quantity' => $debts_quantity,
            'paymets_quantity' => $paymets_quantity,
            'debts_costumers_key' =>  $debts_costumers_key,
            'debts_costumers_val' => $debts_costumers_val,
            'payments'=>$payments,
            'debts'=>$debts,
            'week_statistic_key'=>$week_statistic_key,
            'week_statistic_val'=>$week_statistic_val,
            'week_statistic_pay_key'=>$statistic_pay_key,
            'week_statistic_pay_val'=>$statistic_pay_val,
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
