@extends('backend.layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>CEO Messages</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ceomessage as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->description }}</td>
                        <td>
                            @if ($message->image)
                                <img src="{{ asset('uploads/message/' . $message->image) }}" alt="Image" style="max-width: 100px; max-height: 100px;">
                            @else
                                Not uploaded
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            <a href="{{ route('admin.ceomessage.edit', $message->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.ceomessage.destroy', $message->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?');"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $ceomessage->links() }}
        </div>
    </div>

    <!-- Modal for Deleting Message -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Message Deleted Successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for handling AJAX and Modals -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#deleteModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            });

            // Close modal on click outside or on close button
            $('.modal').on('hidden.bs.modal', function () {
                location.reload();
            });
        });
    </script>
@endsection
