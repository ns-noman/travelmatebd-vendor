@extends('layouts.admin.master')
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin.content-header')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary p-1">
                                <h3 class="card-title">
                                    <a href="{{ route('shipment-boxes.create') }}"class="btn btn-light shadow rounded m-0"><i
                                            class="fas fa-plus"></i>
                                        <span>Add New</span></i></a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-sm table-striped table-bordered table-centre text-center">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Box No</th>
                                                    <th>Box Title</th>
                                                    <th>Invoices</th>
                                                    <th>Origin Branch</th>
                                                    <th>Current Branch</th>
                                                    <th>Destination Branch</th>
                                                    <th>Is Packed?</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click','.pay-now', function(e) {
                $('#sale_id').val($(this).attr('sale-id'));
                $('#amount').val(parseFloat($(this).attr('due')).toFixed(2));
                $('#due_amount').val(parseFloat($(this).attr('due')).toFixed(2));
            });
            $('#form-submit').submit(function(e) {
                let paid_amount = parseFloat($('#amount').val());
                let due = parseFloat($('#due_amount').val());
                if(paid_amount>due){
                    e.preventDefault();
                    Swal.fire("Couldn't be pay more then payable!");
                }
            });
            var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("shipment-boxes.list") }}',
                type: 'GET',
            },
            columns: [
                        { data: null, orderable: false, searchable: false },
                        {
                            data: null, 
                            name: 'shipment_boxes.shipment_no', 
                            orderable: true, 
                            searchable: true, 
                            render: function(data, type, row, meta) {
                                let view = `{{ route('shipment-boxes.invoice', ":id") }}`.replace(':id', row.id);
                                return `<a href="${view}" class=""><b>${row.shipment_no}</b></a>`;
                            }
                        },
                        {
                            data: null, 
                            name: null, 
                            orderable: false, 
                            searchable: false, 
                            render: function(data, type, row, meta) {
                                return row.boxes.box_name;
                            }
                        },
                        {
                            data: 'invoice_numbers',
                            orderable: false, 
                            searchable: false, 
                            render: function(data, type, row, meta) {
                              return data;
                            }
                        },

                        {
                            data: null, 
                            name: null, 
                            orderable: false, 
                            searchable: false, 
                            render: function(data, type, row, meta) {
                                let fromBranch_title = row.from_branch ? row.from_branch.title : 'N/A';
                                return `${fromBranch_title}`;
                            }
                        },  
                        {
                            data: null, 
                            name: null, 
                            orderable: false, 
                            searchable: false, 
                            render: function(data, type, row, meta) {
                                let currentBranch_title = row.current_branch ? row.current_branch.title : 'N/A';
                                return `${currentBranch_title}`;
                            }
                        },  
                        {
                            data: null, 
                            name: null, 
                            orderable: false, 
                            searchable: false, 
                            render: function(data, type, row, meta) {
                                let destinationBranch_title = row.destination_branch ? row.destination_branch.title : 'N/A';
                                return `${destinationBranch_title}`;
                            }
                        },  
                        {
                            data: null, 
                            name: 'shipment_boxes.is_packed', 
                            orderable: true, 
                            searchable: true, 
                            render: function(data, type, row, meta) {
                                let txt = 'No';
                                let bg = 'danger';
                                if(row.is_packed == '1'){
                                    txt = 'Yes';
                                    bg = 'success';
                                }
                                return `<span class="badge bg-${bg}">${txt}</span>`;
                            }
                        },  
                        
                        {
                            data: null,
                            name: 'shipment_boxes.status',
                            orderable: true,
                            searchable: false,
                            render: function(data, type, row, meta) {
                                let color;
                                let text;
                                let eventClass = '';
                                switch (row.status) {
                                    case 'pending':
                                        color = 'warning';
                                        text = 'Pending';
                                        eventClass = 'event';
                                        break;
                                    case 'approved':
                                        color = 'primary';
                                        text = 'Approved';
                                        break;
                                    case 'in_transit':
                                        color = 'warning';
                                        text = 'In transit';
                                        break;
                                    case 'delivered':
                                        color = 'success';
                                        text = 'Delivered';
                                        break;
                                    case 'cancelled':
                                        color = 'danger';
                                        text = 'Cancelled';
                                        break;
                                    default:
                                        color = 'secondary';
                                        text = row.status;
                                }
                                return `<button transaction_id="${row.id}" type="button" class="btn btn-sm btn-${color} ${eventClass}">${text}</button>`;
                            }
                        },

                        { 
                            data: null,
                            orderable: false, 
                            searchable: false, 
                            render: function(data, type, row, meta) {
                                let edit = `{{ route('shipment-boxes.edit', ":id") }}`.replace(':id', row.id);
                                let print = `{{ route('shipment-boxes.invoice.print', [":id", "print"]) }}`.replace(':id', row.id);
                                let destroy = `{{ route('shipment-boxes.destroy', ":id") }}`.replace(':id', row.id);
                                return (` <div class="d-flex justify-content-center">
                                                <a href="${edit}" class="btn btn-sm btn-info ${row.status != 'pending' ? "disabled" : null}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form class="delete" action="${destroy}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" ${row.status != 'pending' ? "disabled" : null}>
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        `);
                            }
                        }
                    ],
                rowCallback: function(row, data, index) {
                    var pageInfo = table.page.info();
                    var serialNumber = pageInfo.start + index + 1;
                    $('td:eq(0)', row).html(serialNumber);
                },
                order: [],
                search: {return: false}
            }); 

            $(document).on('click', '.delete button', function(e) {
                e.preventDefault();
                let form = $(this).closest('form');
                let tr = $(this).closest('tr');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then(async (result) => {
                    if (result.isConfirmed){
                        nsAjaxPost(form.attr('action'), form.serialize())
                        .then(res => {
                            table.draw();
                            message(res);
                        })
                        .catch(err => {
                            message(err);
                        });
                    }
                });
            });
            
            $(document).on('click', '.event', function(e) {
                e.preventDefault();
                let transaction_id = $(this).attr('transaction_id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#198754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Approve",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        const url = `{{ route('shipment-boxes.approve', ":id") }}`.replace(':id', transaction_id);
                        $.ajax({
                            url: url,
                            method: 'GET',
                            dataType: 'JSON',
                            success: function(res) {
                                message(res);
                                table.draw();
                            },
                            error: function(xhr, status, error) {
                                message(xhr.responseJSON);
                            }
                        });
                    }
                });

            });
        });
    </script>
@endsection
