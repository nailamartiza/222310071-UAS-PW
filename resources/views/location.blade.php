@extends('index')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
              <h4>Add Location</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <form action="{{ route('location.store') }}" method="POST" class="d-flex flex-row justify-content-between">
                    @csrf
                    <div class="mb-3">
                      <label for="location" class="form-label">Location Name</label>
                      <input type="text" name="location" class="form-control" id="location">
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div class="mb-3">
                      <label for="trash" class="form-label">Trash Collection</label>
                      <input type="text" name="trash" class="form-control" id="trash">
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude">
                      </div>
                      <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude">
                      </div>
                    <div class="d-flex flex-column align-self-end">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
              <h4>Location</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Location Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Trash Collection</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                      <tr>
                        <th scope="row">{{$location->id}}</th>
                        <td>{{ $location->location }}</td>
                        <td>{{ $location->address }}</td>
                        <td>{{$location->trash}}</td>
                        <td>{{ $location->longitude }}</td>
                        <td>{{ $location->latitude }}</td>
                        <td>
                            <a href="{{ route('location.edit', $location->id) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('location.destroy', $location->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border:none; background:none;"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
