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
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ ($application->demand)->vacancy }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->address }}</td>
                        <td>{{ $application->phone_no }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
