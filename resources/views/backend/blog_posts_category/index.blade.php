@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <h1>Blog Post Categories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td><img src="{{ asset($category->image) }}" alt="Category Image" style="max-width: 100px;"></td>
                        <td>{{ $category->content }}</td>
                        <td>
                            <a href="{{ route('admin.blog-posts-categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.blog-posts-categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
