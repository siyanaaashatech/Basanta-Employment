@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Blog Post Category</h1>
        <form method="POST" action="{{ route('admin.blog-posts-categories.update', $blogPostsCategory->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blogPostsCategory->title }}"
                    required>
            </div>
            <div class="form-group">
                <label for="image">Choose Image:</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                @if ($blogPostsCategory->image)
                    <p>Current Image: {{ $blogPostsCategory->image }}</p>
                @else
                    <p>No current image</p>
                @endif
            </div>
            <div id="imagePreview" class="mt-2"></div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control summernote" id="content" name="content" rows="5" required>{{ $blogPostsCategory->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('image');

            while (preview.firstChild) {
                preview.removeChild(preview.firstChild); // Clear previous preview
            }

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '200px'; // Adjust the maximum width as needed
                    img.style.maxHeight = '200px'; // Adjust the maximum height as needed
                    preview.appendChild(img);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
