@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Team Member</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.teams.update', ['team' => $teamMember->id]) }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $teamMember->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" name="position" id="position" class="form-control" value="{{ $teamMember->position }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $teamMember->phone_no }}" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <input type="text" name="role" id="role" class="form-control" value="{{ $teamMember->role }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $teamMember->email }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
