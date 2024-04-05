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
            <a href="{{ route('admin.demands.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                Demand</a>
            <a href="{{ url('admin') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
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
                <th>Country</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demands as $demand)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $demand->country->name }}</td>
                    <td>{{ $demand->from_date }}</td>
                    <td>{{ $demand->to_date }}</td>
                    <td>{!! $demand->content !!}</td> <!-- Render content as HTML -->
                    <td>
                        <img src="{{ asset('uploads/demands/' . $demand->image) }}" alt="Demand Image"
                            style="max-width: 100px;">
                    </td>
                    <td>
                        <div style="display: flex; flex-direction:row;">
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editModal{{ $demand->id }}" style="margin-right: 5px;"><i
                                    class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteModal{{ $demand->id }}"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $demand->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel{{ $demand->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $demand->id }}">Are you sure you want to
                                    Edit Demands ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a href="{{ route('admin.demands.edit', $demand->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $demand->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel{{ $demand->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $demand->id }}">Delete Demand</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this demand?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form id="deleteForm{{ $demand->id }}"
                                    action="{{ route('admin.demands.destroy', $demand->id) }}" method="POST">
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
