@extends('index')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Location</h4>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('location.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="location" class="form-label">Location Name</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ $location->location }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ $location->address }}">
            </div>
            <div class="mb-3">
                <label for="trash" class="form-label">Trash Collection</label>
                <input type="text" name="trash" class="form-control" id="trash" value="{{ $location->trash }}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude" value="{{ $location->longitude }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude" value="{{ $location->latitude }}">
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
