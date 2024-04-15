@extends('backend.layouts.master')

@section('content')
    <div class="container">

        <!-- Display success and error messages -->
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
                <!-- Link to create a new category -->
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Category</a>
                <!-- Link to go back to admin dashboard -->
                <a href="{{ url('admin') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="col-sm-6">
                <!-- Breadcrumb -->
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>

        <!-- Check if categories are available -->
        @if ($categories->isEmpty())
            <p>No categories found.</p>
        @else
            <!-- Display categories in a table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <!-- Action buttons: Edit and Delete -->
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
