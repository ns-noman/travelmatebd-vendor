@extends('layouts.master')
@section('content')
<style>
    td:nth-child(8),
    td:nth-child(9){
        text-align: right !important;
    }
</style>
<div class="content-wrapper">
    @include('layouts.content-header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary p-1">
                            <h3 class="card-title">
                                <a href="{{ route('vendors.create') }}" class="btn btn-light shadow rounded m-0">
                                    <i class="fas fa-plus"></i> <span>Add New</span>
                                </a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-sm table-striped table-bordered table-centre">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Vendor Type</th>
                                                <th>Name</th>
                                                <th>Contact Person</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>Commission Rate (%)</th>
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
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("vendors.list") }}',
            type: 'GET',
        },
        columns: [
            { data: null, orderable: false, searchable: false },
            { data: 'vendor_type', name: 'vendors.vendor_type', render: function(data){ return data.replace('_',' ').toUpperCase(); } },
            { data: 'name', name: 'vendors.name' },
            { data: 'contact_person', name: 'vendors.contact_person' },
            { data: 'phone', name: 'vendors.phone' },
            { data: 'email', name: 'vendors.email' },
            { data: 'country', name: 'vendors.country' },
            { data: 'commission_rate', name: 'vendors.commission_rate', render: function(data){ return data ? parseFloat(data).toFixed(2) : '0.00'; } },
            { 
                data: 'status', 
                name: 'vendors.status', 
                render: function(data){
                    return `<span class="badge badge-${data == 1 ? 'success' : 'warning'}">${data == 1 ? 'Active' : 'Inactive'}</span>`;
                } 
            },
            { 
                data: null,
                orderable: false, 
                searchable: false, 
                render: function(data, type, row){
                    let edit = `{{ route('vendors.edit', ":id") }}`.replace(':id', row.id);
                    let destroy = `{{ route('vendors.destroy', ":id") }}`.replace(':id', row.id);

                    return `<div class="d-flex justify-content-center">
                                <a href="${edit}" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form class="delete" action="${destroy}" method="post" hidden>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>`;
                }
            }
        ],
        rowCallback: function(row, data, index){
            var pageInfo = table.page.info();
            var serialNumber = pageInfo.start + index + 1;
            $('td:eq(0)', row).html(serialNumber);
        },
        order: [],
        search: { return: false }
    });
</script>
@endsection
