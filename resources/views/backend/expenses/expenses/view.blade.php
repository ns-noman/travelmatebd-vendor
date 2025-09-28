@extends('layouts.admin.master')
@section('content')
@php
    $data['basicInfo']['currency_symbol'] = '৳';
@endphp
<link rel="stylesheet" href="{{ asset('public/admin-assets') }}/dist/css/vouchar.css">
<div id="invoiceholder">
        <div id="invoice" class="effect2">
            <div style="margin-top: 20px; text-align: center; font-size: 24px; font-weight: bold; text-transform: uppercase; margin-bottom: 15px;">
                Expense Voucher
            </div>            
            <div id="invoice-top">
                <div class="logo"><img src="{{ asset('public/uploads/basic-info/' . $data['basicInfo']['logo']) }}"
                        alt="Logo" /></div>
                <div class="title">
                    <h1 class="h1">Vouchar #<span class="invoiceVal invoice_num">{{ $data['master']['expense_no'] }}</span></h1>
                    <p class="p">Vouchar Date: <span id="invoice_date">{{ date('dS M Y', strtotime($data['master']['date'])) }}</span></p>
                    <p class="p mt-0"><span><svg class="barcode"></svg></span></p>
                </div>
            </div>
            <div id="invoice-mid">
                <div class="clearfix">
                    <div class="col-left">
                        <div class="clientinfo">
                        </div>
                    </div>
                    <div class="col-right">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><span>Vouchar Total</span><label
                                            id="invoice_total">{{ $data['basicInfo']['currency_symbol'] }}
                                            {{ number_format($data['master']['total_amount'], 2) }}</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span>Note</span>:<label
                                            id="note">{{ $data['master']['note'] }}</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="invoice-bot">
                <div class="table-2">
                    <table class="table-main" style="text-align: center;">
                        <thead>
                            <tr>
                                <th width="5%">SN</th>
                                <th>Service Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody  style="text-align: center;">
                            @foreach ($data['master']['details'] as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $value['expense_head'] }}</td>
                                    <td>{{ $value['amount'] }}</td>
                                    <td>{{ $value['quantity'] }}</td>
                                    <td>{{ $value['amount'] * $value['quantity'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

 
            <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="p" class="col-right">Our mailing address is:
                        <span class="email"><a class="a"
                                href="mailto:supplier.portal@almonature.com">supplier.portal@almonature.com</a></span>
                    </p>
                </div>
            </footer>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            if ("{ $data['print'] }}" == 'print') {
                var printContents = document.getElementById('invoice').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
            $('.pay-now').on('click', function(e) {
                $('#purchase_id').val($(this).attr('purchase-id'));
                $('#amount').val(parseFloat($(this).attr('due')).toFixed(2));
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/barcodes/JsBarcode.code128.min.js"></script>
    <script type="text/javascript">
        JsBarcode(".barcode", "{{ $data['master']['expense_no'] }}", {
            width: 1,
            height: 30,
            displayValue: false
        });
    </script>
@endsection