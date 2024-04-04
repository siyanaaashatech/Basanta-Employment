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
            <a href="{{ route('admin.visitors-book.create') }}"><button class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>Add Visitors Book</button></a>
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
                <th>Phone Number</th>
                <th>Email</th>
                <th>Country</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitorBooks as $visitorBook)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $visitorBook->name ?? '' }}</td>
                    <td>{{ $visitorBook->phone_no ?? '' }}</td>
                    <td>{{ $visitorBook->email ?? '' }}</td>
                    <td>{{ $visitorBook->country->name ?? 'No Country' }}</td>
                    <td>{{ $visitorBook->description ?? '' }}</td>
                    <td>
                        <div style="display: flex; flex-direction:row;">
                            <!-- Edit Button -->
                            <a href="#" class="btn btn-warning btn-sm" style="margin-right: 5px;" data-toggle="modal"
                                data-target="#editModal{{ $visitorBook->id }}"><i class="fas fa-edit"></i> Edit</a>

                            <!-- Delete Button with Modal -->
                            <form action="{{ route('admin.visitors-book.destroy', $visitorBook->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#deleteModal{{ $visitorBook->id }}">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $visitorBook->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel{{ $visitorBook->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $visitorBook->id }}">Edit Visitor Book Entry
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- No form fields inside the modal body -->
                                <!-- You can provide instructions or additional information here if needed -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- Submit button placed within the form -->
                                <form action="{{ route('admin.visitors-book.edit', $visitorBook->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Delete Modal -->
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $visitorBook->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel{{ $visitorBook->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $visitorBook->id }}">Delete Visitor Book
                                    Entry</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this item?
                            </div>
                            <div class="modal-footer">
                                <form id="deleteForm{{ $visitorBook->id }}"
                                    action="{{ route('admin.visitors-book.destroy', $visitorBook->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Main row -->

    {{-- <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script> --}}
@endsection
