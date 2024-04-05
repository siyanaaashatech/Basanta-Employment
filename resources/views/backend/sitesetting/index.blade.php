@extends('backend.layouts.master')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif


    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
            <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Back</button></a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div>
    </div>


    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Office Name</th>
                <th>Office Email</th>
                <th>Office Contact</th>
                <th>Office Logo</th>
                <th>Slogan</th> <!-- Add this line for the Slogan field -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sitesettings as $sitesetting)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $sitesetting->office_name ?? '' }}</td>
                    <td>{{ $sitesetting->office_email ?? '' }}</td>
                    <td>{{ $sitesetting->office_contact ?? '' }}</td>
                    <td><img id="preview{{ $loop->iteration }}"
                            src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}"
                            style="width: 150px; height:150px" /></td>
                    <td>{{ $sitesetting->slogan ?? '' }}</td> <!-- Add this line for the Slogan field -->
                    <td>
                        <div style="display: flex; flex-direction:row;">
                            <a href="{{ route('admin.site-settings.edit', $sitesetting->id) }}"
                                class="btn btn-warning btn-sm" style="margin-right: 5px;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>
@endsection
