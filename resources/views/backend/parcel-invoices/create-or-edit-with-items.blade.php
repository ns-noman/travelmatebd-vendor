@extends('layouts.admin.master')
@section('content')
    <style>
        table td,
        table th {
            padding: 3px !important;
            text-align: center;
            align-items: center;
        }

        input[type="number"] {
            text-align: right;
        }

        .item {
            text-align: left;
        }

        .form-group {
            padding: 2px;
            margin: 0px;
        }

        label {
            margin-bottom: 0px;
        }
    </style>
    <div class="content-wrapper">
        @include('layouts.admin.content-header')
        <section class="content">
            <div class="container-fluid">
                <form id="form-submit"
                    action="{{ isset($data['item']) ? route('parcel-invoices.update', $data['item']->id) : route('parcel-invoices.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf()
                    @if (isset($data['item']))
                        @method('put')
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Shipment Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>HAWB No <span class="text-danger">*</span></label>
                                            <input value="{{ $data['item']->hawb_no ?? '' }}" type="text" name="hawb_no" class="form-control" placeholder="House Air Waybill No" required>
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Reference</label>
                                            <input value="{{ $data['item']->reference ?? '' }}" type="text" name="reference" class="form-control" placeholder="Reference">
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Pieces <span class="text-danger">*</span></label>
                                            <input value="{{ $data['item']->pieces ?? '' }}" type="number" name="pieces" class="form-control" placeholder="Total Pieces" required>
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Product Value</label>
                                            <input value="{{ $data['item']->product_value ?? '' }}" type="number" name="product_value" class="form-control" placeholder="Value in BDT">
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Billing Weight (kg) <span class="text-danger">*</span></label>
                                            <input value="{{ $data['item']->billing_weight_kg ?? '' }}" type="number" name="billing_weight_kg" class="form-control" placeholder="Kg" required>
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Billing Weight (gm) <span class="text-danger">*</span></label>
                                            <input value="{{ $data['item']->billing_weight_gm ?? '' }}" type="number" name="billing_weight_gm" class="form-control" placeholder="Gm" required>
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Gross Weight (kg)</label>
                                            <input value="{{ $data['item']->gross_weight_kg ?? '' }}" type="number" step="0.01" name="gross_weight_kg" class="form-control" placeholder="Gross Weight in Kg" readonly>
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Payment Mode <span class="text-danger">*</span></label>
                                            <select name="payment_mode" class="form-control" required>
                                                <option value="">Select Mode</option>
                                                <option value="Prepaid" {{ isset($data['item']) && $data['item']->payment_mode == 'Prepaid' ? 'selected' : '' }}>Prepaid</option>
                                                <option value="Collect" {{ isset($data['item']) && $data['item']->payment_mode == 'Collect' ? 'selected' : '' }}>Collect</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>COD Amount <span class="text-danger">*</span></label>
                                            <input value="{{ $data['item']->cod_amount ?? '' }}" type="number" step="0.01" name="cod_amount" class="form-control" placeholder="Cash On Delivery Amount" required>
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Item Type <span class="text-danger">*</span></label>
                                            <select name="item_type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="SPX" {{ isset($data['item']) && $data['item']->item_type == 'SPX' ? 'selected' : '' }}>SPX</option>
                                                <option value="DOCS" {{ isset($data['item']) && $data['item']->item_type == 'DOCS' ? 'selected' : '' }}>DOCS</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>All Item Names</label>
                                            <input value="{{ $data['item']->all_item_names ?? '' }}" type="text" name="all_item_names" class="form-control" placeholder="All Item Names">
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Item Description</label>
                                            <textarea name="item_description" class="form-control" placeholder="Item Description" rows="1">{{ $data['item']->item_description ?? '' }}</textarea>
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Length (cm)</label>
                                            <input value="{{ $data['item']->length ?? '' }}" type="number" step="0.01" name="length" class="form-control" placeholder="Length in cm">
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Height (cm)</label>
                                            <input value="{{ $data['item']->height ?? '' }}" type="number" step="0.01" name="height" class="form-control" placeholder="Height in cm">
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Width (cm)</label>
                                            <input value="{{ $data['item']->width ?? '' }}" type="number" step="0.01" name="width" class="form-control" placeholder="Width in cm">
                                        </div>

                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Weight (kg)</label>
                                            <input value="{{ $data['item']->weight ?? '' }}" type="number" step="0.01" name="weight" class="form-control" placeholder="Weight in kg" readonly>
                                        </div>



                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-3">
                                            <div class="table-responsive">
                                                <table id="table"
                                                    class="table table-striped table-bordered table-centre p-0 m-0">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">SN</th>
                                                            <th width="30%">
                                                                <div class="d-flex justify-content-center align-items-center gap-1">
                                                                    Item Name: 
                                                                    <input type="text" class="form-control form-control-sm" id="item_name_input" placeholder="Item Name">
                                                                    <input type="hidden" id="item_name_temp">
                                                                    <input type="hidden" id="item_id_temp">
                                                                </div>
                                                            </th>
                                                            <th width="10%">Quantity</th>
                                                            <th width="10%">Unit Price</th>
                                                            <th width="10%">Sub Total</th>
                                                            <th width="5%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">
                                                        @isset($data['parcelInvoiceDetails'])
                                                            @foreach ($data['parcelInvoiceDetails'] as $pid)
                                                                <tr>
                                                                    <td class="serial">{{ $loop->iteration }}</td>
                                                                    <td class="text-left">
                                                                       {{ ucwords($pid['item_name']) }}
                                                                        <input type="hidden" value="{{  $pid['parcel_invoice_id'] }}" name="item_id[]">
                                                                    </td>
                                                                    <td><input type="number" value="{{ $pid['quantity'] }}"
                                                                            class="form-control form-control-sm calculate"
                                                                            name="quantity[]" placeholder="0.00" required>
                                                                    </td>
                                                                    <td><input type="number" value="{{ $pid['unit_price'] }}"
                                                                            class="form-control form-control-sm calculate"
                                                                            name="unit_price[]" placeholder="0.00" required>
                                                                    </td>
                                                                    <td><input type="number"
                                                                            value="{{ $pid['unit_price'] * $pid['quantity'] }}"
                                                                            class="form-control form-control-sm"
                                                                            name="sub_total[]" placeholder="0.00" disabled>
                                                                    </td>
                                                                    <td><button class="btn btn-sm btn-danger btn-del"
                                                                            type="button"><i
                                                                                class="fa-solid fa-trash btn-del"></i></button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Discount Method</label>
                                            <select name="discount_method" id="discount_method" class="form-control">
                                                <option @selected(isset($data['item']) && $data['item']['discount_method'] == 0) selected value="0">In Percentage
                                                </option>
                                                <option @selected(isset($data['item']) && $data['item']['discount_method'] == 1) value="1">Solid Amount</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Discount Rate</label>
                                            <input
                                                value="{{ isset($data['item']) ? $data['item']->discount_rate : null }}"
                                                step="0.01" type="number" class="form-control" name="discount_rate"
                                                id="discount_rate" placeholder="0.00">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Discount Amount</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->discount : null }}"
                                                readonly type="number" class="form-control" name="discount"
                                                id="discount" placeholder="0.00">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                            <label>Total</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->total_price : null }}"
                                                type="number" class="form-control" name="total_price" id="total_price"
                                                placeholder="0.00" readonly>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Vat</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->vat_tax : null }}"
                                                readonly value="0.00" type="number" class="form-control"
                                                name="vat_tax" id="vat_tax" placeholder="0.00">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Total Payable</label>
                                            <input
                                                value="{{ isset($data['item']) ? $data['item']->total_payable : null }}"
                                                readonly type="number" class="form-control" name="total_payable"
                                                id="total_payable" placeholder="0.00">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4" hidden>
                                            <label>Paid Amount</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->paid_amount : null }}"
                                                value="0.00" step="0.01" type="number" class="form-control"
                                                name="paid_amount" id="paid_amount" placeholder="0.00">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Refference Number</label>
                                            <input
                                                value="{{ isset($data['item']) ? $data['item']->reference_number : null }}"
                                                class="form-control" type="text" name="reference_number"
                                                id="reference_number" placeholder="Reference Number">
                                        </div>
                                        <div class="form-group col-sm-8 col-md-8 col-lg-8">
                                            <label>Note</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->note : null }}"
                                                class="form-control" type="text" name="note" id="note"
                                                placeholder="Note">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Shipper & Consignee Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <h5>Shipper Information</h5>
                                        </div>
                                    </div>
                                    <hr style="height: 2px; border: none; background-color: #ccc; border-radius: 3px; margin: 5px 0;">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_name : null }}"
                                                type="text" class="form-control" name="sender_name"
                                                placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Company <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_company : null }}"
                                                type="text" class="form-control" name="sender_company"
                                                placeholder="Company" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>Address</label>
                                            <textarea class="form-control" name="sender_address" placeholder="Address" cols="30" rows="1">{{ isset($data['item']) ? $data['item']->sender_address : null }}</textarea>
                                        </div>
                                         <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>City</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_city : null }}"
                                                type="text" class="form-control" name="sender_city"
                                                placeholder="City">
                                        </div>
                                         <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Zip Code</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_zip ?? $data['item']->sender_zip : null }}"
                                                type="number" class="form-control" name="sender_zip"
                                                placeholder="3850">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Country</label>
                                            <select class="form-control select2" id="sender_country_id" name="sender_country_id">
                                                <option value="">Select Country</option>
                                                @foreach ($data['counties'] as $key => $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ isset($data['item']) ? ($data['item']->sender_country_id == $country->id ? 'selected' : null) : null }}>
                                                        {{ $country->country_name }} ({{ $country->country_code }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Phone</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_phone : null }}"
                                                type="number" class="form-control" name="sender_phone"
                                                placeholder="+8801XXXXXXXXX">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Email</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_email : null }}"
                                                type="email" class="form-control" name="sender_email"
                                                placeholder="example@gmail.com">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Origin</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->sender_origin : null }}"
                                                type="text" class="form-control" name="sender_origin"
                                                placeholder="Origin">
                                        </div>
                                    </div>

                                    <hr style="height: 3px; border: none; background-color: #ccc; border-radius: 3px; margin: 20px 0;">

                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <h5>Consignee Information</h5>
                                        </div>
                                    </div>
                                    <hr style="height: 2px; border: none; background-color: #ccc; border-radius: 3px; margin: 5px 0;">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_name : null }}"
                                                type="text" class="form-control" name="receiver_name"
                                                placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Company <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_company : null }}"
                                                type="text" class="form-control" name="receiver_company"
                                                placeholder="Company" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>Address</label>
                                            <textarea class="form-control" name="receiver_address" placeholder="Address" cols="30" rows="1">{{ isset($data['item']) ? $data['item']->receiver_address : null }}</textarea>
                                        </div>
                                         <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>City <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_city : null }}"
                                                type="text" class="form-control" name="receiver_city"
                                                placeholder="City" required>
                                        </div>
                                         <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Zip Code <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_zip ?? $data['item']->receiver_zip : null }}"
                                                type="number" class="form-control" name="receiver_zip"
                                                placeholder="3850" required>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Country <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="receiver_country_id" name="receiver_country_id" required>
                                                <option value="">Select Country</option>
                                                @foreach ($data['counties'] as $key => $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ isset($data['item']) ? ($data['item']->receiver_country_id == $country->id ? 'selected' : null) :  ($country->id == 18 ? 'selected' : null)}}>
                                                        {{ $country->country_name }} ({{ $country->country_code }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_phone : null }}"
                                                type="number" class="form-control" name="receiver_phone"
                                                placeholder="+8801XXXXXXXXX" required>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Email</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_email : null }}"
                                                type="email" class="form-control" name="receiver_email"
                                                placeholder="example@gmail.com">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                            <label>Origin</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->receiver_origin : null }}"
                                                type="text" class="form-control" name="receiver_origin"
                                                placeholder="Origin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Booking & Export Date</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Booking Date <span class="text-danger">*</span></label>
                                            <input name="booking_date" id="booking_date" type="date"
                                                value="{{ isset($data['item']) ? $data['item']->booking_date : date('Y-m-d') }}"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Export Date <span class="text-danger">*</span></label>
                                            <input name="export_date" id="export_date" type="date"
                                                value="{{ isset($data['item']) ? $data['item']->export_date : date('Y-m-d') }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                

                                {{-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> --}}
                </form>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table').bind('keyup, input', function(e) {
                if ($(e.target).is('.calculate')) {
                    calculate();
                }
            });
            $('#tbody').bind('click', function(e) {
                $(e.target).is('.btn-del') && e.target.closest('tr').remove();
                $(".serial").each(function(index) {
                    $(this).html(index + 1);
                });
                calculate();
            });
        });
        $('#form-submit').submit(function(e) {
            if (!$('input[name="item_id[]"]').length) {
                e.preventDefault();
                Swal.fire("Please Insert Item!");
            }
            if (parseFloat($('#paid_amount').val()) > parseFloat($('#total_payable').val())) {
                e.preventDefault();
                Swal.fire("Couldn't be pay more then payable!");
            }
        });
        $('#discount_rate').on('keyup', function(e) {
            calculate();
        });

        $('#discount_method').on('change', function(e) {
            calculate();
        });

        function calculate() {
            let item_id = $('input[name="item_id[]"]');
            let total_price = 0;
            for (let i = 0; i < item_id.length; i++) {
                let quantity = $('input[name="quantity[]"]')[i].value;
                let unit_price = $('input[name="unit_price[]"]')[i].value;
                let sub_total = $('input[name="sub_total[]"]')[i].value;
                sub_total = unit_price * quantity;
                total_price += sub_total;
                $('input[name="sub_total[]"]')[i].value = sub_total;
            }
            $('#total_price').val(total_price.toFixed(2));
            let discount_method = $('#discount_method').val();
            let discount_rate = parseFloat($('#discount_rate').val()) || 0;
            let vat_tax = parseFloat($('#vat_tax').val()) || 0;
            let discount = 0;
            let total_payable = 0;
            if (discount_method == 0) {
                discount = total_price * (discount_rate / 100);
            } else {
                discount = discount_rate;
            }
            total_payable = total_price + vat_tax - discount;
            $('#paid_amount').val(total_payable.toFixed(2));
            $('#discount').val(discount.toFixed(2));
            $('#total_payable').val(total_payable.toFixed(2));
        }

        function checkDuplicate(item_id) {
            let isDuplicate = false;
            $('#tbody tr').each(function() {
                let existingItemId = $(this).find('input[name="item_id[]"]').val();
                if (existingItemId == item_id) {
                    isDuplicate = true;
                    return false;
                }
            });
            return isDuplicate;
        }

        function duplicateAlert() {
            Swal.fire({
                icon: 'error',
                title: 'Duplicate Item',
                text: 'This Item has already been added!'
            });
        }

        function isLowStock(itemType, stockQty, insertQty) {
            return itemType == '0' && insertQty > stockQty;
        }

        function stockAlert() {
            Swal.fire({
                icon: 'error',
                title: 'Warning!',
                text: 'Exceed Product Stock!'
            });
        }
    </script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#item_name_input").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('parcel-invoices.items') }}",
                type: "POST",
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                    
                }
            });
        },

        change: function(event, ui) {
            if (!ui.item) {
                event.currentTarget.value = '';
                event.currentTarget.focus();
            }
        },
        select: function(event, ui) {
            $('#item_name_input').val(ui.item.label);
            $('#item_name_temp').val(ui.item.label);
            $('#item_id_temp').val(ui.item.item_id);
            return false;
        }
    });


    $("#item_name_input").on("keydown", async function (e) {
        if (e.key === "Enter" || e.keyCode === 13) {
            e.preventDefault();
            const item_name_input = $("#item_name_input").val();
            const item_name_temp = $("#item_name_temp").val();
            const item_id_temp = $("#item_id_temp").val();
            if(!item_id_temp && item_name_input){
                const item = await storeItem(item_name_input);
                $("#item_name_temp").val(item.name);
                $("#item_id_temp").val(item.id);
            }
            generateRow();
            $("#item_name_input").val('');
            $("#item_name_temp").val('');
            $("#item_id_temp").val('');
        }
    });

    function generateRow()
    {
        let item_id = $('#item_id_temp').val();
        let item_name = $('#item_name_temp').val();
        let item_price = 1000;
        let unit_price_temp = 1000;
        let quantity_temp = 1;
        let total_temp = unit_price_temp * quantity_temp;
        let tbody = ``;


        tbody += `<tr>
                    <td class="serial"></td>
                    <td class="text-left">
                        ${item_name}
                        <input type="hidden" value="${item_id}" name="item_id[]">
                    </td>
                    <td><input type="number" value="${quantity_temp}" class="form-control form-control-sm calculate" name="quantity[]" placeholder="0.00" required></td>
                    <td><input type="number" value="${unit_price_temp}" class="form-control form-control-sm calculate" name="unit_price[]" placeholder="0.00" required></td>
                    <td><input type="number" value="${total_temp}" class="form-control form-control-sm" name="sub_total[]" placeholder="0.00" disabled></td>
                    <td><button class="btn btn-sm btn-danger btn-del" type="button"><i class="fa-solid fa-trash btn-del"></i></button></td>
                </tr>`;

        $('#tbody').append(tbody);
        $(".serial").each(function(index) {
            $(this).html(index + 1);
        });
        calculate();
    }

    async function storeItem(itemName)
    {
        try {
            const item = await $.ajax({
                url: "{{ route('parcel-invoices.store-new-item') }}",
                type: "POST",
                dataType: "json",
                data: {
                    name: itemName,
                }
            });
            return item;
        } catch (error) {
            console.error("Error: ", error);
            return null
        }
    }


</script>

@endsection
