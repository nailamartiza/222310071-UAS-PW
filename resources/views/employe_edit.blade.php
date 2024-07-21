@extends('index')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Officer</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('employe.update', $employee->id) }}" method="POST" class="d-flex flex-column">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role_id" class="form-control" id="role" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $employee->role_id == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $employee->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" name="nip" class="form-control" id="nip" value="{{ $employee->nip }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
