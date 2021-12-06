<?php

namespace App\Http\Livewire;

use PDF;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\SalesRep;
use Illuminate\Http\Request;

class CreatePayrollForm extends Component
{
    public $salesrepname;
    public $salesrepfullname;
    public $month;
    public $period;
    public $year;
    public $opening_balance;
    public $bonuses;
    public $number_of_clients;

    public $lead_purchased;
    public $issue_charge;
    public $agency_release;

    public $client_name;
    public $eliteinsure_commissions;

    public $validatedData;
    public $disabled = 'disabled';

    protected $rules = [
        'salesrepname'      => 'required',
        'month'             => 'required',
        'period'            => 'required',
        'year'              => 'required',
        'opening_balance'   => 'required',
        'bonuses'           => 'required',
        'number_of_clients' => 'required',
        'lead_purchased'    => 'required',
        'issue_charge'      => 'required',
        'agency_release'    => 'required',
        'client_name'       => 'required',
        'eliteinsure_commissions'       => 'required',
    ];
    
    public function updated($propertyName)
    {
        
        $this->validateOnly($propertyName);
        $salesrepSpecific = SalesRep::where('id', $this->salesrepname)->first();
        $this->eliteinsure_commissions=$salesrepSpecific->commission;
        $this->salesrepfullname=$salesrepSpecific->salesrep_name;
        $this->disabled = '';
    }

    public function savePayroll()
    {
        $this->validatedData = $this->validate();

        $datas = [
            'date'              => date('m/d/Y'),
            'commission'        => $this->eliteinsure_commissions,
            'bonuses'           => $this->bonuses,
            'salesrepname'      => $this->salesrepfullname,
        ];
           
        $pdf = PDF::loadView('testPDF', $datas)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            Carbon::now().".pdf"
        );
    }

    public function render()
    {
        $salesrep = SalesRep::orderBy('created_at', 'desc')->get();
       
        return view('livewire.create-payroll-form', compact('salesrep'));
    }
}
