import React from 'react';
import { Head, Link } from '@inertiajs/react';
import MainLayout from '../../Shared/MainLayout';

const PermissionIndex = ({ permissions }) => {
    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this permission?')) {
            // Inertia handles DELETE request
            // Inertia.delete(route('role-permission-ui.permissions.destroy', id));
        }
    };

    return (
        <MainLayout>
            <Head title="Permission Management" />

            <div className="container mx-auto px-4 py-8">
                <div className="bg-white shadow-md rounded-lg p-6">
                    <div className="flex justify-between items-center mb-6">
                        <h1 className="text-2xl font-bold">Permission Management</h1>
                        <Link href={route('role-permission-ui.permissions.create')} className="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Create New Permission
                        </Link>
                    </div>

                    {permissions.length > 0 ? (
                        <table className="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th className="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody className="bg-white divide-y divide-gray-200">
                                {permissions.map(permission => (
                                    <tr key={permission.id}>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{permission.name}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button onClick={() => handleDelete(permission.id)} className="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    ) : (
                        <p className="text-center text-gray-500">No permissions found.</p>
                    )}
                </div>
            </div>
        </MainLayout>
    );
};

export default PermissionIndex;
