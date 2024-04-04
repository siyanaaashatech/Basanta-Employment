@extends('backend.layouts.master')

@section('content')
    <!-- Success and error messages -->
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

    <!-- Add video button -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
            <a href="{{ route('admin.video-galleries.create') }}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add Video
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

    <!-- Table for displaying videos -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $video->title ?? '' }}</td>
                    <td>
                        <iframe width="100" height="100" src="https://www.youtube.com/embed/{{ $video->url }}"
                            title="{{ $video->title }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: row;">
                            <button onclick="editVideo({{ $video->id }})" class="btn btn-warning btn-sm"
                                style="margin-right: 5px;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button onclick="deleteVideo({{ $video->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Edit Video Modal -->
    <div class="modal fade" id="editVideoModal" tabindex="-1" role="dialog" aria-labelledby="editVideoModalLabel"
        aria-hidden="true">
        <!-- Modal content for editing video -->
    </div>

    <!-- Delete Video Modal -->
    <div class="modal fade" id="deleteVideoModal" tabindex="-1" role="dialog" aria-labelledby="deleteVideoModalLabel"
        aria-hidden="true">
        <!-- Modal content for deleting video -->
    </div>

    <!-- JavaScript functions for modals -->
    <script>
        // Function to open edit video modal and set action URL
        function editVideo(id) {
            var url = "{{ route('admin.video-galleries.edit', ':id') }}";
            url = url.replace(':id', id);
            $('#editVideoModal').load(url, function() {
                $(this).modal('show');
            });
        }

        // Function to open delete video modal and set action URL
        function deleteVideo(id) {
            var url = "{{ route('admin.video-galleries.destroy', ':id') }}";
            url = url.replace(':id', id);
            $('#deleteVideoModal').load(url, function() {
                $(this).modal('show');
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
