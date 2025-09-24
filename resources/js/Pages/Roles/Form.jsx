import React, { useEffect } from 'react';
import { useForm, Head } from '@inertiajs/react';
import MainLayout from '../../Shared/MainLayout';

const RoleForm = ({ role = null, permissions }) => {
    const isEditing = !!role;
    const pageTitle = isEditing ? `Edit Role: ${role.name}` : 'Create New Role';

    const { data, setData, post, put, processing, errors, reset } = useForm({
        name: role?.name || '',
        permissions: role?.permissions.map(p => p.name) || [],
    });

    useEffect(() => {
        return () => reset();
    }, [role]);

    const handleSubmit = (e) => {
        e.preventDefault();
        if (isEditing) {
            put(route('role-permission-ui.roles.update', role.id));
        } else {
            post(route('role-permission-ui.roles.store'));
        }
    };

    return (
        <MainLayout>
            <Head title={pageTitle} />

            <div className="container mx-auto px-4 py-8">
                <div className="bg-white shadow-md rounded-lg p-6">
                    <h1 className="text-2xl font-bold mb-6">{pageTitle}</h1>
                    
                    <form onSubmit={handleSubmit}>
                        <div className="mb-4">
                            <label htmlFor="name" className="block text-sm font-medium text-gray-700">Role Name</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                className={`mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ${errors.name ? 'border-red-500' : ''}`}
                            />
                            {errors.name && <div className="text-red-500 text-sm mt-1">{errors.name}</div>}
                        </div>

                        <div className="mb-4">
                            <label htmlFor="permissions" className="block text-sm font-medium text-gray-700">Permissions</label>
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
                                {isEditing ? 'Update Role' : 'Save Role'}
                            </button>
                            <a href={route('role-permission-ui.roles.index')} className="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </MainLayout>
    );
};

export default RoleForm;
