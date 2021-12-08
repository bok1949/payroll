<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Generate PDF</title>
    
    <style>
        body{
            font-size: 14px;
            margin: 0%;
        }
        .text-u{
            text-decoration: underline;
        }
        .fw-bold{
            font-weight: bold;
        }
        .logo-pdf {
            height: 24px;
            width: 24px;
        }
        header{
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            color: #005dc0;
            margin-top: 2px;
            margin-bottom: 2px;
        }
        .namepanel{
            padding: 12px 16px;
            background-color: rgb(172, 169, 169);
            margin: auto;
            width: 94%;
        }
        .dateholder{
            float: right;
        }
        .sr-details-holder{
            margin-top: 42px;
        }

        .col-left, .col-center{
            width: 28.5%;
        }
        .col-right{
            width: 32.5%;
        }
        .col-left, .col-center, .col-right{
            display: inline-block;
            height: 86px;
            padding: 6px 12px;
        }

        .po-details{
            display: block;
            padding-left: 32%;
        }
        .prod-by{
            display: block;
            text-align: center;
        }
        .tax-invoice-table-holder table{
            border-collapse: collapse;
            width: 90%;
        }
        .tax-invoice-table-holder table thead{
            background-color:rgb(172, 169, 169); 
        }
        .tax-invoice-table-holder table td, .tax-invoice-table-holder table th{
            padding: 10px 6px;
            border: 1px solid #111;
        }
        .taxinvoice-summary{
            width: 50%;
           
        }
        .taxinvoice-summary span{
            display: inline-block;
            border-bottom: solid 1px rgb(29, 29, 29);
            
        }
        .taxinvoice-summary .label{
            width: 40%;
            text-align: right;
            margin-left: 2px;
        }
        .taxinvoice-summary .value{
            width: 35%;
            text-align: left;
            padding-left: 4px;
        }
        .dcs-container table{
            border-collapse: collapse;
            width: 90%;
            text-align: center;
        }
        .dcs-container table td{
            padding: 10px 6px;
        }
        .dcs-container table th{
            text-decoration: underline;
            padding: 10px 6px;
        }
    </style>
</head>
<body>
    
   
    <img src="../public/images/ei-logo-1.png" alt="" class="logo-pdf">
    <header>Buyer Created Tax Invoice</header>

    <div class="namepanel">
        <span class="namelabel fw-bold">SALESREP NAME: {{$salesrepname}}</span>
        <span class="dateholder fw-bold">{{$date}}</span>
    </div>

    <div class="sr-details-holder">
        <div class="col-left">
            <span class="label-holder fw-bold text-u">Produced on:</span>  <span>{{$date}}</span>
            <span class="po-details">
                Summit Monga
                1C/39 Mackelvie street,
                grey lynn, 1021, Auckland
            </span>
        </div><!--
        --><div class="col-center">
            <span class="fw-bold text-u prod-by">Produced by:</span>
            <span class="prod-by">
                Eliteinsure limited <br>
                1C/39 Mackelvie Street Grey Lynn
                1021 Auckland New Zealand
                +6493789676
            </span>
        </div><!--
        --><div class="col-right">
            <span class="fw-bold text-u">Statement Date: </span> <span>{{$dateperiod}}</span> <br>
            <span class="fw-bold text-u">Payment Type:</span> <span>Direct Credit</span>
        </div>
    </div>

    <div class="tax-invoice-table-holder">
        <h3>Buyer Created Tax Invoice</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$date}}</td>
                    <td>Commission</td>
                    <td></td>
                    <td>${{$commission}}</td>
                </tr>
                <tr>
                    <td>{{$date}}</td>
                    <td>Bonuses</td>
                    <td></td>
                    <td>{{$bonuses}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>total debit</td>
                    <td>
                        @php
                            $totalcredit = $commission+$bonuses;
                        @endphp
                        ${{$totalcredit}}
                    </td>
                </tr>
                <tr>
                    <td>{{$date}}</td>
                    <td>Material and software fee</td>
                    <td>@php
                        echo $msf = -20;
                    @endphp
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="font-weight: bold; text-align:right; border: none;">Totals</td>
                    <td style="font-weight: bold; text-align:center; border: none;">{{$msf}}</td>
                    <td style="font-weight: bold; text-align:center; border: none;">{{$totalcredit}}</td>
                </tr>
            </tbody>
        </table>

        <div class="taxinvoice-summary">
    
            <span class="label">Net: </span>            <span class="value">{{$totalcredit - $msf}}</span>
            <span class="label">Witholding tax:</span>  <span class="value">$0.00</span>
            <span class="label">Payment Amount:</span>  <span class="value">{{$totalcredit - $msf}}</span>
            
        </div>

    </div>

    <div class="tax-invoice-table-holder" style="page-break-after: always;">
        <h3>Agency Account Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Opening Balance</td>
                    <td></td>
                    <td></td>
                    <td>876.65</td>
                </tr>
                <tr>
                    <td>Agency Movement in Agency Account</td>
                    <td></td>
                    <td>{{$agency_release}}</td>
                    <td>{{($totalcredit - $msf) - $agency_release}}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Closing Balance</td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold;">{{($totalcredit - $msf) - $agency_release}}</td>
                </tr>
               
            </tbody>
        </table>    
    </div>


    <img src="../public/images/ei-logo-1.png" alt="" class="logo-pdf">
    {{-- <img src="{{asset('images/ei-logo-1.png')}}" alt="" class="logo-pdf"> --}}
    <header>Detail Commission Statement</header>

    <div class="namepanel">
        <span class="namelabel fw-bold">SALESREP NAME: {{$salesrepname}}</span>
        <span class="dateholder fw-bold">{{$date}}</span>
    </div>
    <div class="namepanel" style="margin-top: 4px; margin-bottom: 4px;">
        <span class="fw-bold">Production</span>
    </div>

    <div class="dcs-container">
        <table>
            <thead>
                <tr>
                    <th>Client name</th>
                    <th>Annual Premium</th>
                    <th>Commission</th>
                    <th>G.S.T</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalap=0;
                    $totalcom=0;
                    $totalbal=0;
                @endphp
                @foreach ($client_namear as $item)
                    <tr>
                        <td>{{$item}}</td>
                        <td>
                            @php
                                $totalap += $commission*2;
                            @endphp
                            {{$commission*2}}
                        </td>
                        <td>
                            @php
                                $totalcom += $commission;
                            @endphp
                            {{$commission}}
                        </td>
                        <td>0.00</td>
                        <td>
                            @php
                                $totalbal += $commission;
                            @endphp
                            {{$commission}}
                        </td>
                    </tr>
                @endforeach
                
                <tr style="font-weight: bold;">
                    <td>Totals</td>
                    <td>{{$totalap}}</td>
                    <td>{{$totalcom}}</td>
                    <td>0.00</td>
                    <td>{{$totalbal}}</td>
                </tr>
            </tbody>
        </table>
    </div>


    

    
</body>
</html>