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
                            <form action="{{ isset($data['item']) ? route('users.update',$data['item']->id) : route('users.store'); }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                @if(isset($data['item']))
                                    @method('put')
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Role</label>
                                            <select class="form-control" name="type" required @disabled(isset($data['item']) && ($data['item']->type == 1))>
                                                <option value=''>Select Role</option>
                                                @foreach ($data['vendor_roles'] as $role)
                                                    <option @selected(isset($data['item']) && $data['item']->type == $role->id) value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Name *</label>
                                            <input value="{{ $data['item']->name ?? null }}" @disabled(isset($data['item']) && ($data['item']->type == 1)) required type="text" class="form-control" name="name" id="name" placeholder="Name">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Contact No</label>
                                            <input value="{{ $data['item']->mobile ?? null }}" type="text" class="form-control" name="mobile" id="mobile" placeholder="+88 01XXXXXXXXX">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                            <label>Email *</label>
                                            <input value="{{ $data['item']->email ?? null }}" @disabled(isset($data['item']) && ($data['item']->type == 1)) required type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label>Password</label>
                                            <input @required(!isset($data['item'])) type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label>Confirm Password</label>
                                            <input @required(!isset($data['item'])) type="password" onkeyup="checkPassword()" class="form-control"
                                                id="conpassword" name="conpassword" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option @selected(($data['item']->status ?? null) == 1) value="1">Active</option>
                                                <option @selected(($data['item']->status ?? null) == 0) value="0">Inactive</option>
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
@section('script')
    <script type="text/javascript">
        function checkPassword() {
            var x = document.getElementById("password").value;
            var y = document.getElementById("conpassword").value;
            if (x == y) {
                var input = document.getElementById("conpassword");
                input.style.borderColor = 'green';
            } else {
                var input = document.getElementById("conpassword");
                input.style.borderColor = 'red';
            }
        }
    </script>
@endsection
