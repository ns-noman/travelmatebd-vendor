@php
    $basicInfo = App\Models\BasicInfo::first();
    $vendorBasicInfo = App\Models\VendorBasicInfo::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $basicInfo->title ?? 'Admin Panel' }}</title>
    @include('layouts.links')
    <style>
        th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
            @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.scripts')
</body>
@yield('script')
</html>