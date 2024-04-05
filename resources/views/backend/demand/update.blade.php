@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Edit Demand</span>
                            <a href="{{ route('admin.demands.index') }}" class="btn btn-primary">Back</a> <!-- Back button -->
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.demands.update', $demand->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="country_id">Country</label>
                                <select name="country_id" id="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $demand->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="from_date">From Date</label>
                                <input type="date" name="from_date" id="from_date" class="form-control"
                                    value="{{ $demand->from_date }}">
                            </div>

                            <div class="form-group">
                                <label for="to_date">To Date</label>
                                <input type="date" name="to_date" id="to_date" class="form-control"
                                    value="{{ $demand->to_date }}">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="5">{{ $demand->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file"
                                    onchange="previewImage(event)">
                            </div>

                            <div class="form-group">
                                <img id="preview" src="{{ asset('storage/' . $demand->image) }}" alt="Current Image"
                                    style="max-width: 200px;">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>
@endsection
