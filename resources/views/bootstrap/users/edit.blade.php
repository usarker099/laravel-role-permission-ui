@extends('role-permission-ui::bootstrap.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Edit User: {{ $user->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('role-permission-ui.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="roles" class="form-label">Roles</label>
                    <select class="form-select @error('roles') is-invalid @enderror" id="roles" name="roles[]" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role }}" @if($user->hasRole($role)) selected @endif>{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="permissions" class="form-label">Direct Permissions</label>
                    <select class="form-select @error('permissions') is-invalid @enderror" id="permissions" name="permissions[]" multiple>
                        @foreach($permissions as $permission)
                            <option value="{{ $permission }}" @if($user->hasPermissionTo($permission)) selected @endif>{{ $permission }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('role-permission-ui.users.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
