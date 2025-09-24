@extends('role-permission-ui::bootstrap.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create New Permission</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('role-permission-ui.permissions.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Permission</button>
                <a href="{{ route('role-permission-ui.permissions.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
