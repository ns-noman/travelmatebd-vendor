@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    @include('layouts.content-header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Form</h3>
                        </div>
                        <form action="{{ route('basic-infos.update', $data['basicInfo']->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-label">Title *</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $data['basicInfo']->title }}" placeholder="Title" required>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="logo" class="form-label">Logo (100 X 100)*</label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="favicon" class="form-label">Favicon (32 X 32)*</label>
                                        <input type="file" name="favicon" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                        <label for="phone" class="form-label">Phone *</label>
                                        <input type="text"  value="{{ $data['basicInfo']->phone }}" name="phone" class="form-control" placeholder="+88 01*********" required>
                                    </div>
                                    <div class="form-group col-sm-3 col-md-3 col-lg-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email"  value="{{ $data['basicInfo']->email }}" name="email" class="form-control" placeholder="example@gmail.com" required>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" id="address" cols="30" rows="1" name="address"  placeholder="Address" required>{{ $data['basicInfo']->address }}</textarea>
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

{{-- @section('script')
<script>
    $('#MetaDescription').summernote({
        placeholder: 'Meta Description',
        tabsize: 2,
        height: 100
    });
    $('#GoogleMap').summernote({
        placeholder: 'Google Map',
        tabsize: 2,
        height: 100
    });
    $('#GoogleAnalytics').summernote({
        placeholder: 'Google Analytics',
        tabsize: 2,
        height: 100
    });
    $('#Address').summernote({
        placeholder: 'Address',
        tabsize: 2,
        height: 100
    });
</script>
@endsection --}}