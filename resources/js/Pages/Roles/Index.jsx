import React from 'react';
import { Head, Link } from '@inertiajs/react';
import MainLayout from '../../Shared/MainLayout';

const RoleIndex = ({ roles }) => {
    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this role?')) {
            // Inertia.delete(route('role-permission-ui.roles.destroy', id));
        }
    };

    return (
        <MainLayout>
            <Head title="Role Management" />

            <div className="container mx-auto px-4 py-8">
                <div className="bg-white shadow-md rounded-lg p-6">
                    <div className="flex justify-between items-center mb-6">
                        <h1 className="text-2xl font-bold">Role Management</h1>
                        <Link href={route('role-permission-ui.roles.create')} className="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Create New Role
                        </Link>
                    </div>

                    {roles.length > 0 ? (
                        <table className="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                                    <th className="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody className="bg-white divide-y divide-gray-200">
                                {roles.map(role => (
                                    <tr key={role.id}>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{role.name}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {role.permissions.map(permission => (
                                                <span key={permission} className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                                    {permission}
                                                </span>
                                            ))}
                                        </td>
                                        <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link href={route('role-permission-ui.roles.edit', role.id)} className="text-indigo-600 hover:text-indigo-900 mr-2">Edit</Link>
                                            <button onClick={() => handleDelete(role.id)} className="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    ) : (
                        <p className="text-center text-gray-500">No roles found.</p>
                    )}
                </div>
            </div>
        </MainLayout>
    );
};

export default RoleIndex;
