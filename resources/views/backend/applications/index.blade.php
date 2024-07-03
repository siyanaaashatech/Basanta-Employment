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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
