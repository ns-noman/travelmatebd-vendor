@php
    $basicInfo = App\Models\BasicInfo::first();
    $userImage = asset('public/admin-assets/dist/img/avatar5.png');
    if(Auth::guard('admin')->user()->image) $userImage = asset('public/uploads/admin/'. Auth::guard('admin')->user()->image);
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