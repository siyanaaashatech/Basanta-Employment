@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Application For {{ $demand->vacancy }}</h1>
        <form action="{{ route('apply.store', ['id' => $demand->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone_no" name="phone_no" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp_no" class="form-label">WhatsApp Number</label>
                <input type="tel" class="form-control" id="whatsapp_no" name="whatsapp_no">
            </div>
            <div class="mb-3">
                <label for="cv" class="form-label">Upload Cv</label>
                <input type="file" class="form-control" id="cv" name="cv">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Upload Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="apply-btn">Submit Application</button>
        </form>
    </div>

    <!-- Custom CSS -->
    <style>
        .apply-btn {

            background-color: rgba(99, 2, 2, 0.8);
            color: whitesmoke;
            border: 1px solid black;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px; /* Adjust spacing as needed */
            margin-bottom: 10px;
            border-radius: 5px;
            text-decoration: none; 
            display: inline-block; 
        }

        .apply-btn:hover {
            background-color: grey;
            color: whitesmoke;
        }
    </style>
@endsection
