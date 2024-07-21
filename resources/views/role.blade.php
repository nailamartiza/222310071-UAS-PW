@extends('index')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
              <h4>Create Role</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('role.store') }}" method="POST" class="d-flex flex-column">
                    @csrf
                    <div class="mb-3">
                        <label for="roleID" class="form-label">Role ID</label>
                        <input type="text" name="roleID" class="form-control" id="roleID">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="role" class="form-control" id="role">
                    </div>
                    <div class="d-flex flex-column align-self-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
              <h4>Roles</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Role ID</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->roleID }}</td>
                                <td>{{ $role->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
