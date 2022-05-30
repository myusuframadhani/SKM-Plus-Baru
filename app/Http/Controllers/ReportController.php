<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = \App\Models\Cabang::all();
        return view('finance.report.index',compact('cabang'));
    }

    // periode var
    public $month = "01";
    public $year = "2000";

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cabang($id)
    {
        $cabang = \App\Models\Cabang::findOrFail($id);
        $month = 1;
        $year = 2000;

        // set month name
        $list = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $monthName = $list[$month - 1];
        
        $totalSale = 0;
        $totalExpense = 0;
        $totalAll = 0;
        return view('finance.report.cabang',compact('cabang','monthName','year','totalSale','totalExpense','totalAll')); 
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cabangPeriode(Request $request, $id)
    {
        $month = $request->month;
        $year = $request->year;

        // set month name
        $list = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $monthName = $list[$month - 1];

        $cabang = \App\Models\Cabang::findOrFail($id);
        $order = \App\Models\Order::where("id_cabang", $cabang->id)->whereMonth('created_at', '=', date($month))->whereYear('created_at', '=', date($year))->get();
        $expense = \App\Models\Finance::where("id_cabang", $cabang->id)->whereMonth('created_at', '=', date($month))->whereYear('created_at', '=', date($year))->get();

        // count report
        $totalSale = 0;
        // looping sale
        foreach($order as $data) {
            $totalOrder = 0;
            // looping order
            foreach($order as $or) {
                $result = $or->total;
                // insert result to totalOrder
                $totalOrder += $result;
            }
            // insert total per order to totalSale
            $totalSale += $totalOrder;
        }
        
        $totalExpense = 0;
        foreach($expense as $exp) {
            $result = $exp->jumlah_pengeluaran;
            // insert result to totalExpense
            $totalExpense += $result;
        }

        $totalAll = $totalSale - $totalExpense;
        return view('finance.report.cabang',compact('cabang','monthName','year','totalSale','totalExpense','totalAll')); 
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recap()
    {
        $month = 1;
        $year = 2000;

        // set month name
        $list = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $monthName = $list[$month - 1];
        
        $totalSale = 0;
        $totalExpense = 0;
        $totalAll = 0;
        return view('finance.report.recap',compact('monthName','year','totalSale','totalExpense','totalAll')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recapPeriode(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        // set month name
        $list = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $monthName = $list[$month - 1];

        $expense = \App\Models\Finance::whereMonth('created_at', '=', date($month))->whereYear('created_at', '=', date($year))->get();
        $order = \App\Models\Order::whereMonth('created_at', '=', date($month))->whereYear('created_at', '=', date($year))->get();
        
        // set month name
        $list = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $monthName = $list[$month - 1];

        // count report
        $totalSale = 0;
        // looping sale
        foreach($order as $data) {
            $totalOrder = 0;
            // looping order
            foreach($order as $or) {
                $result = $or->total;
                // insert result to totalOrder
                $totalOrder += $result;
            }
            // insert total per order to totalSale
            $totalSale += $totalOrder;
        }
        
        $totalExpense = 0;
        foreach($expense as $exp) {
            $result = $exp->jumlah_pengeluaran;
            // insert result to totalExpense
            $totalExpense += $result;
        }
        
        $totalAll = $totalSale - $totalExpense;
        return view('finance.report.recap',compact('monthName','year','totalSale','totalExpense','totalAll'));
    }
}