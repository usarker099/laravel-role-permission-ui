import React, { useEffect } from 'react';
import { useForm, Head } from '@inertiajs/react';
import MainLayout from '../../Shared/MainLayout';

const UserForm = ({ user, roles, permissions }) => {
    const { data, setData, put, processing, errors, reset } = useForm({
        roles: user.roles,
        permissions: user.permissions,
    });

    useEffect(() => {
        return () => reset();
    }, [user]);

    const handleSubmit = (e) => {
        e.preventDefault();
        put(route('role-permission-ui.users.update', user.id));
    };

    return (
        <MainLayout>
            <Head title={`Edit User: ${user.name}`} />

            <div className="container mx-auto px-4 py-8">
                <div className="bg-white shadow-md rounded-lg p-6">
                    <h1 className="text-2xl font-bold mb-6">Edit User: {user.name}</h1>
                    
                    <form onSubmit={handleSubmit}>
                        <div className="mb-4">
                            <label htmlFor="roles" className="block text-sm font-medium text-gray-700">Roles</label>
                            <select
                                id="roles"
                                name="roles[]"
                                multiple
                                value={data.roles}
                                onChange={(e) => setData('roles', Array.from(e.target.selectedOptions, option => option.value))}
                                className={`mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ${errors.roles ? 'border-red-500' : ''}`}
                            >
                                {roles.map((role) => (
                                    <option key={role} value={role}>
                                        {role}
                                    </option>
                                ))}
                            </select>
                            {errors.roles && <div className="text-red-500 text-sm mt-1">{errors.roles}</div>}
                        </div>

                        <div className="mb-4">
                            <label htmlFor="permissions" className="block text-sm font-medium text-gray-700">Direct Permissions</label>
                            <select
                                id="permissions"
                                name="permissions[]"
                                multiple
                                value={data.permissions}
                                onChange={(e) => setData('permissions', Array.from(e.target.selectedOptions, option => option.value))}
                                className={`mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ${errors.permissions ? 'border-red-500' : ''}`}
                            >
                                {permissions.map((permission) => (
                                    <option key={permission} value={permission}>
                                        {permission}
                                    </option>
                                ))}
                            </select>
                            {errors.permissions && <div className="text-red-500 text-sm mt-1">{errors.permissions}</div>}
                        </div>

                        <div className="flex justify-between items-center">
                            <button
                                type="submit"
                                disabled={processing}
                                className="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
                            >
                                Update User
                            </button>
                            <a href={route('role-permission-ui.users.index')} className="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </MainLayout>
    );
};

export default UserForm;
