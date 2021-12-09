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

    public $client_namear=array();
    public $client_name0;
    public $client_name1;
    public $client_name2;
    public $client_name3;
    public $client_name4;
    public $client_name5;
    public $client_name6;
    public $client_name7;
    public $client_name8;
    public $client_name9;
    public $client_name10;

    protected $listeners = ['clientsName'];

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
        /* 'client_name'       => 'required', */
        'eliteinsure_commissions'       => 'required',
    ];
    
    
    public function updated($propertyName)
    {
        
        if($this->number_of_clients > 0){
            unset($this->client_namear);
            $this->client_namear=array();
            for ($i=0; $i < $this->number_of_clients; $i++) { 
                array_push($this->client_namear, 'client_name'.$i);
                
            }
        }
        
        //dd($propertyName);

        $this->validateOnly($propertyName);
		
        $salesrepSpecific = SalesRep::where('id', $this->salesrepname)->first();
        $this->eliteinsure_commissions=$salesrepSpecific->commission;
        $this->salesrepfullname=$salesrepSpecific->salesrep_name;
        $this->bonuses=$salesrepSpecific->bonuses;
        $this->disabled = '';
    }

    public function savePayroll()
    {
        $cn = array();
        if (count($this->client_namear) > 0) {
            foreach ($this->client_namear as $key => $value) {
                $this->rules = array_merge($this->rules, [
                    $value => 'required'
                ]);
                $cn[] = $this->$value;
            }
        }
        $this->validatedData = $this->validate();
        //dd($cn);
        $datas = [
            'date'                  => date('m/d/Y'),
            'commission'            => $this->eliteinsure_commissions,
            'bonuses'               => $this->bonuses,
            'salesrepname'          => $this->salesrepfullname,
            'opening_balance'       => $this->opening_balance,
            'agency_release'        => $this->agency_release,
            'client_nametoprint'    => $cn,
            'dateperiod'            => $this->month.' '.$this->period.', '.$this->year,
        ];
           
        $pdf = PDF::loadView('testPDF', $datas)->output();
        //dd($pdf);
        return response()->streamDownload(
            fn () => print($pdf),
            Carbon::now()."file.pdf"
        );
    }

    public function render()
    {
        $salesrep = SalesRep::orderBy('created_at', 'desc')->get();
       
        return view('livewire.create-payroll-form', compact('salesrep'));
    }
}
