@extends('layouts.admin.master')
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin.content-header')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $data['title'] }} Form</h3>
                            </div>
                            <form action="{{ isset($data['item']) ? route('flights.update',$data['item']->id) : route('flights.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @if(isset($data['item']))
                                    @method('put')
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Hub *</label>
                                            <select class="form-control select2" name="hub_id" required>
                                                <option value=''>Select Flight</option>
                                                @foreach ($data['branches'] as $branch)
                                                    <option class="{{ $branch->is_main_branch ? 'bg-warning' : null }}"  @selected(isset($data['item']) && $data['item']->hub_id == $branch->id) value="{{ $branch->id }}">
                                                        {{ $branch->title }} {{ $branch->is_main_branch? '(Main)' : null }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Flight Name *</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->flight_name : null }}" type="text" class="form-control" name="flight_name" placeholder="Flight Name" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Flight Code *</label>
                                            <input value="{{ isset($data['item']) ? $data['item']->flight_code : null }}" type="text" class="form-control" name="flight_code" placeholder="Flight Code" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Status *</label>
                                            <select name="status" id="status" class="form-control">
                                                <option @selected(($data['item']['status'] ?? null) === 1) value="1">Active</option>
                                                <option @selected(($data['item']->status ?? null) === 0) value="0">Inactive</option>
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