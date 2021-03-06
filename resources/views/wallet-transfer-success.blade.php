@extends('layouts.user')

@section('title')
      Transfer to Bank
@endsection
@section('content')

<style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }

        .modal-header {
            border-bottom: 2px solid #828282;
        }

        .modal-body {
            border-bottom: none;
        }

        .modal-body {
            text-align: center;
        }

        .modal-body h4 {
            color: #FF6200;
            font-weight: bold;
            font-size: 16px;
        }

        .modal-title {
            text-align: center;
            font-weight: bold;
        }

        table {
            text-align: left;
            width: 100%;
        }
        .table>tr{
            border:0px;
        }

        td {
            padding: 10px 30px;
        }

        tr > td:first-child {
            font-weight: bold;
        }

        .text-orange{
            color: #FF6200;
            text-align: left;
        }

        button {
            float: left;
            transition: color 2s, background 1s;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
            border-radius: 63px;
            padding:6px 15px;
            background: #FF6200;
            color: white;
            border: none;
        }

        .modal-footer button:hover {
            background: white;
            color: #FF6200;
        }
    </style>

@if(Session::has('status'))
@php($data = Session::get('status'))
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">TRANSFER RULES</h3>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4>YOUR TRANSACTION WAS SUCCESSFULL</h4>
            </div>

            <div class="table-responsive">
               <table class="table">
                 <tbody>
                   <tr><td><b>Source Wallet</b></td><td> {{$data['sourceWallet']}}</td></tr>
                   <tr><td><b>Beneficiary/Recipient Wallet</b></td><td>{{$data['recipientWallet']}}</td></tr>
                  <tr><td><b>Amount</b></td><td>&#8358; {{$data['amount']}}</td></tr>
                 </tbody>
               </table>
            </div>

            <div class="col-sm-12">
            <p class="text-orange">Click print to print receipt for reference </p>
            </div>

             <!-- Modal Header -->
            <div class="modal-header">
              <button>Print</button>
            </div>
</div>
@endif
@endsection