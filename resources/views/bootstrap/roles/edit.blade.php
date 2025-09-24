@extends('role-permission-ui::bootstrap.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit Role: {{ $role->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('role-permission-ui.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="permissions" class="form-label">Permissions</label>
                    <select class="form-select @error('permissions') is-invalid @enderror" id="permissions" name="permissions[]" multiple>
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}" @if($role->hasPermissionTo($permission->name)) selected @endif>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Role</button>
                <a href="{{ route('role-permission-ui.roles.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection