<!DOCTYPE html>
<html>
<head>
    
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body{
            font-size: 12px;
        }
    </style>
</head>
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4>LOGO ELITEINSURE</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center text-primary">Buyer Created Tax Invoice</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-dark" role="alert">
                    <span>SALESREP NAME:</span> <span class="text-uppercase fw-bold">{{$salesrepname}}</span>
                    <span class="fw-bold float-right">{{$date}}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <span class="fw-bold text-decoration-underline">Produced on: {{$date}}</span>
                <span class="">
                    Summit Monga <br>
                    1C/39 Mackelvie street, <br>
                    grey lynn, 1021, Auckland
                </span>
            </div>
            <div class="col-sm-4">
                <span class="fw-bold">Produced by:</span>
                <span>
                    Eliteinsure limited <br>
                    1C/39 Mackelvie Street Grey Lynn <br>
                    1021 Auckland New Zealand <br>
                    +6493789676
                </span>
            </div>
            <div class="col-sm-4">
                <span class="fw-bold text-decoration-underline">Statement Date: </span> <span>{{$date}}</span> <br>
                <span class="fw-bold text-decoration-underline">Payment Type:</span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>Buyer Created Tax Invoice</h3>
                <table class="table table-bordered">
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
                            <td>{{floatval($commission)}}</td>
                        </tr>
                        <tr>
                            <td>{{$date}}</td>
                            <td>Bonuses</td>
                            <td></td>
                            <td>{{floatval($bonuses)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>$0.00</td>
                            <td>${{floatval($commission)+floatval($bonuses)}}</td>
                        </tr>
                        @php
                            $msfeedebit=-20;
                            $msfeecredit=-3;
                        @endphp
                        <tr>
                            <td>{{$date}}</td>
                            <td>Material & Software Fee</td>
                            <td>{{$msfeedebit}}</td>
                            <td>{{$msfeecredit}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>Agency Account Details</h3>
                <table class="table table-bordered">
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
                            <td></td>
                        </tr>
                        <tr>
                            <td>Agency Movement in Agency Account</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Closing Balance</td>
                            <td></td>
                            <td></td>
                            <td>${{round($commission+$bonuses, 2)}}</td>
                        </tr>
                        @php
                            $msfeedebit=-20;
                            $msfeecredit=-3;
                        @endphp
                        <tr>
                            <td>{{$date}}</td>
                            <td>Material & Software Fee</td>
                            <td>{{$msfeedebit}}</td>
                            <td>{{$msfeecredit}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
</body>
</html>