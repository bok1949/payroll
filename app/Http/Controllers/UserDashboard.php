<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SalesRep;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function addSalesrepForm(){
        return view('dashboard.addsalesrep');
    }

    public function saveaddSalesrepForm(Request $request){

        $request->validate([
            'salesrepname' => 'required'
        ]);

        $salesrep = new SalesRep;

        $salesrep->salesrep_name = $request->salesrepname;
        $salesrep->commission = $request->setcommission;
        $salesrep->tax_rate = $request->taxrate;
        $salesrep->bonuses = $request->bonus;
        $salesrep->created_at = Carbon::now();

        $salesrep->save();

        return back()->with('success', 'Successfully created');

    }

    public function showAllSalesrep(){
        $salesrep = SalesRep::orderBy('created_at', 'desc')->get();
        return view('dashboard.showallsalesrep', compact('salesrep'));
    }

    public function createPayroll(){
        /* $salesrep = SalesRep::orderBy('created_at', 'desc')->get(); */
        return view('dashboard.createPayroll');
    }

    public function createPayrollPDF(){
        dd("creating " . $data);
    }

}
