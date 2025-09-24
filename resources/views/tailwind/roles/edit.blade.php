@extends('role-permission-ui::tailwind.layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Edit Role: <span class="text-indigo-600">{{ $role->name }}</span></h2>
        </div>

        <form action="{{ route('role-permission-ui.roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                    <div class="mt-1">
                        <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                    <div class="mt-1">
                        <select id="permissions" name="permissions[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('permissions') border-red-500 @enderror">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}" @if($role->hasPermissionTo($permission->name)) selected @endif>{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('permissions')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Role</button>
                <a href="{{ route('role-permission-ui.roles.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection