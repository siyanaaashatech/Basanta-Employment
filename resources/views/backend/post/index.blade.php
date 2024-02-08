@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        @if ($posts->isEmpty())
            <p>No posts found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th> <!-- Add image column -->
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100px;">

                                @else
                                    No image available
                                @endif
                            </td>
                            <td>{{ $post->category ? $post->category->title : 'No category' }}</td>
                            <td>
                                <!-- Add action buttons here -->
                                <!-- Example: Edit and Delete buttons -->
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
