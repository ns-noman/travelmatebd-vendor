@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    @include('layouts.content-header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $data['title'] }} Form</h3>
                        </div>
                        <form action="{{ isset($data['item']) ? route('vendors.update',$data['item']->id) : route('vendors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($data['item']))
                                @method('put')
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Vendor Type *</label>
                                        <select name="vendor_type" id="vendor_type" class="form-control" required>
                                            @php
                                                $types = ['airline','hotel','transport','tour_operator','other'];
                                            @endphp
                                            @foreach($types as $type)
                                                <option value="{{ $type }}" @selected(($data['item']->vendor_type ?? '') === $type)>{{ ucfirst(str_replace('_',' ',$type)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Vendor Name" value="{{ $data['item']->name ?? '' }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" value="{{ $data['item']->contact_person ?? '' }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $data['item']->phone ?? '' }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $data['item']->email ?? '' }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="{{ $data['item']->country ?? '' }}">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" id="address" placeholder="Address" rows="2">{{ $data['item']->address ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Commission Rate (%)</label>
                                        <input type="number" step="0.01" class="form-control" name="commission_rate" id="commission_rate" placeholder="Commission Rate" value="{{ $data['item']->commission_rate ?? '' }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" @selected(($data['item']->status ?? 1) == 1)>Active</option>
                                            <option value="0" @selected(($data['item']->status ?? 1) == 0)>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
