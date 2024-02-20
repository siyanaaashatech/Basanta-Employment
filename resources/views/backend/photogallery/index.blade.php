@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->

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
            <a href="{{ route('admin.photo-galleries.create') }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add Photo
                </button>
            </a>
            <a href="{{ url('admin') }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
            </a>
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
                <th>Title</th>
                <th>Image Description</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gallery as $image)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $image->title }}</td>
                    <td>{{ $image->img_desc ?? '' }}</td>
                    <td>
                        @if (is_array($image->img))
                            <div class="album-container">
                                @foreach ($image->img as $index => $imagePath)
                                    <img class="album-image" id="preview{{ $loop->parent->iteration }}{{ $index }}"
                                        src="{{ asset('uploads/photogallery/' . $imagePath) }}"
                                        style="width: 50px; height:50px" />
                                @endforeach
                            </div>
                        @else
                            <img id="preview{{ $loop->iteration }}"
                                src="{{ asset('uploads/photogallery/' . $image->img) }}"
                                style="width: 150px; height:150px" />
                        @endif
                    </td>
                    <td>
                        <div style="display: flex; flex-direction:row;">
                            <a href="{{ route('admin.photo-galleries.edit', $image->id) }}" class="btn btn-warning btn-sm"
                                style="margin-right: 5px;"><i class="fas fa-edit"></i>
                                Edit</a>
                            <form action="{{ route('admin.photo-galleries.destroy', $image->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Main row -->

    <script>
        // Function to preview images
        const previewImage = e => {
            const files = e.target.files;
            const albumContainer = e.target.parentElement.previousElementSibling;
            albumContainer.innerHTML = '';
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = () => {
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.style.width = '50px';
                    img.style.height = '50px';
                    albumContainer.appendChild(img);
                };
                reader.readAsDataURL(files[i]);
            }
        };

        // Find all file inputs and attach event listener for previewing images
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', previewImage);
        });
    </script>
@endsection
