@extends('role-permission-ui::bootstrap.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Permission Management</h5>
            <a href="{{ route('role-permission-ui.permissions.create') }}" class="btn btn-primary btn-sm">Create New Permission</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <form action="{{ route('role-permission-ui.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
