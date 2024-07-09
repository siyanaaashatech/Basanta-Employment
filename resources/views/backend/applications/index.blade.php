@extends('backend.layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Applications</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Demand</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>WhatsApp Number</th>
                    <th>CV</th>
                    <th>Photo</th>
                    <th>Actions</th> <!-- Added Actions column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->demand->vacancy }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->address }}</td>
                        <td>{{ $application->phone_no }}</td>
                        <td>{{ $application->whatsapp_no }}</td>
                        <td>
                            @if ($application->cv)
                                <a href="{{ asset($application->cv) }}" target="_blank">View CV</a>
                            @else
                                Not uploaded
                            @endif
                        </td>
                        <td>
                            @if ($application->photo)
                                <img src="{{ asset($application->photo) }}" alt="Applicant Photo" style="max-width: 100px;">
                            @else
                                Not uploaded
                            @endif
                        </td>
                        <td style="white-space: nowrap;"> <!-- Actions column -->
                            <form class="accept-form" action="{{ route('applications.accept', $application->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $application->id }}">
                                <button type="button" class="btn btn-warning btn-sm accept-btn">
                                    <i class="fas fa-check"></i> Accept
                                </button>
                            </form>
                            <form class="reject-form" action="{{ route('applications.reject', $application->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $application->id }}">
                                <button type="button" class="btn btn-danger btn-sm reject-btn">
                                    <i class="fas fa-times"></i> Reject
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Accepting Application -->
    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptModalLabel">Accept Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Application Accepted Successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Rejecting Application -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Application Rejected Successfully!
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
            $('.accept-btn').click(function() {
                var form = $(this).closest('form');
                var applicationId = form.find('input[name="application_id"]').val();
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        application_id: applicationId
                    },
                    success: function(response) {
                        $('#acceptModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            });
    
            $('.reject-btn').click(function() {
                var form = $(this).closest('form');
                var applicationId = form.find('input[name="application_id"]').val();
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        application_id: applicationId
                    },
                    success: function(response) {
                        $('#rejectModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                    }
                });
            });
    
            // Close modal on click outside or on close button
            $('.modal').on('hidden.bs.modal', function () {
                $(this).find('form')[0].reset(); // Optional: Reset form fields when modal closes
            });
        });
    </script>
    
@endsection
