@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for update -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $post->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                <div id="imagePreview" class="mt-2">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100px;">
                        
                    @else
                        No image available
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    <script>
        // Function to preview image
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagePreview');

            while (preview.firstChild) {
                preview.removeChild(preview.firstChild); 
            }

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px'; 
                    preview.appendChild(img);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
