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
            <a href="{{ url('admin') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> 
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form id="quickForm" method="POST" action="{{ route('admin.video-galleries.update', $video->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $video->id }}">
                
                <div class="form-group">
                    <label for="title">Title (In English)</label><span style="color:red; font-size:large"> *</span>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title', $video->title) }}">
                </div>
                
                <div class="form-group">
                    <label for="title_ne">Title (In Nepali)</label>
                    <input type="text" name="title_ne" class="form-control" id="title_ne" placeholder="Title" value="{{ old('title_ne', $video->title_ne) }}">
                </div>
                
                <div class="form-group">
                    <label for="url">URL</label><span style="color:red; font-size:large"> *</span>
                    <input type="text" name="url" class="form-control" id="url" placeholder="URL" value="{{ old('url', $video->url) }}">
                </div>
                
                <div class="form-group">
                    <label for="preview">Preview Image</label>
                    <input type="file" class="form-control-file" id="preview" accept="image/*" onchange="previewImage(event)">
                    <img id="preview1" src="{{ $video->preview_url }}" alt="Preview Image" style="max-width: 200px; margin-top: 10px;">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            reader.onload = function() {
                const preview = document.getElementById('preview1');
                preview.src = reader.result;
            };
        }
    </script>
@endsection
