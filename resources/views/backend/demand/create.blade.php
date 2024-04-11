@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Demand</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.demands.store') }}" id="demandForm"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="country_id">Country</label>
                                <select name="country_id" id="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="from_date">From Date</label>
                                <input type="date" name="from_date" id="from_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="to_date">To Date</label>
                                <input type="date" name="to_date" id="to_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="vacancy">Demands</label>
                                <input type="text" name="vacancy" id="vacancy" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control summernote" rows="5"></textarea>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200, // Set the height of the editor
                minHeight: null, // Set the minimum height of the editor
                maxHeight: null, // Set the maximum height of the editor
                focus: true // Set focus to the editor after initialization
            });
        });
    </script>
@endsection
