@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    @include('layouts.content-header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if ($data['basicInfo'])
                    <section class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $data['basicInfo']->title }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Meta Keywords</th>
                                                    <td>{{ $data['basicInfo']->meta_keywords }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Meta Description</th>
                                                    <td>{{ $data['basicInfo']->meta_description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $data['basicInfo']->phone }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Telephone</th>
                                                    <td>{{ $data['basicInfo']->telephone }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Fax</th>
                                                    <td>{{ $data['basicInfo']->fax }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $data['basicInfo']->email }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Location</th>
                                                    <td>{{ $data['basicInfo']->location }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{ $data['basicInfo']->address }}</td>
                                                </tr>
                                                @php
                                                    $uploadPath   = env('UPLOAD_PATH') . '/vendor-basic-info/';
                                                    $uploadUrl    = env('UPLOAD_URL') . '/vendor-basic-info/';
                                                    $placeholder  = env('PLACEHOLDER', asset('public/admin-assets/dist/img/avatar5.png'));

                                                    $logoPath     = $uploadPath . ($data['basicInfo']->logo ?? '');
                                                    $faviconPath  = $uploadPath . ($data['basicInfo']->favicon ?? '');

                                                    $logoImage    = !empty($data['basicInfo']->logo) && File::exists($logoPath) ? $uploadUrl . $data['basicInfo']->logo : $placeholder;
                                                    $faviconImage = !empty($data['basicInfo']->favicon) && File::exists($faviconPath) ? $uploadUrl . $data['basicInfo']->favicon : $placeholder;
                                                @endphp

                                                <tr>
                                                    <th>Logo</th>
                                                    <td>
                                                        <img src="{{ $logoImage }}" alt="Logo" height="100" width="100">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Fav Icon</th>
                                                    <td>
                                                        <img src="{{ $faviconImage }}" alt="Favicon" height="32" width="32">
                                                    </td>
                                                </tr>

                                                <tr hidden>
                                                    <th>Web Link</th>
                                                    <td>{{ $data['basicInfo']->web_link }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Facebook Link</th>
                                                    <td>{{ $data['basicInfo']->facebook_link }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Twitter Link</th>
                                                    <td>{{ $data['basicInfo']->twitter_link }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Linkedin Link</th>
                                                    <td>{{ $data['basicInfo']->linkedin_link }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Youtube Link</th>
                                                    <td>{{ $data['basicInfo']->youtube_link }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Assets value</th>
                                                    <td>{{ $data['basicInfo']->assets_value }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Total employees</th>
                                                    <td>{{ $data['basicInfo']->total_employees }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Total companies</th>
                                                    <td>{{ $data['basicInfo']->total_companies }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Start year</th>
                                                    <td>{{ $data['basicInfo']->start_year }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Map embed</th>
                                                    <td>{{ $data['basicInfo']->map_embed }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Video One</th>
                                                    <td>{{ $data['basicInfo']->video_embed_1 }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Video Two</th>
                                                    <td>{{ $data['basicInfo']->video_embed_2 }}</td>
                                                </tr>
                                                <tr hidden>
                                                    <th>Video Three</th>
                                                    <td>{{ $data['basicInfo']->video_embed_3 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('vendor-basic-infos.edit', $data['basicInfo']->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
