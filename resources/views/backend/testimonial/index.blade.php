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
            <a href="{{ route('admin.testimonials.create') }}"><button class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>Add
                Testimonial</button></a>
            <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Back</button></a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Image</th>
                <th>University</th>
                <th>Course</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonials as $testimonial)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $testimonial->name ?? '' }}</td>
                    <td> <img id="preview{{ $loop->iteration }}"
                            src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                            style="width: 150px; height:150px" /></td>
                    <td>{{ $testimonial->university->title ?? 'No University' }}</td>
                    <td>{{ $testimonial->course->title ?? 'No Course' }}</td>
                    <td>{{ $testimonial->description ?? '' }}</td>
                    <td>
                        <div style="display: flex; flex-direction:row;">
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editModal{{ $testimonial->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <!-- Delete Button -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteModal{{ $testimonial->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $testimonial->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel{{ $testimonial->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $testimonial->id }}">Edit Testimonial</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>To edit this testimonial, please click the button below:</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                    class="btn btn-primary">Edit Testimonial</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel{{ $testimonial->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $testimonial->id }}">Delete Testimonial</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this testimonial?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Main row -->

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
