import React from 'react';
import { useForm, Head } from '@inertiajs/react';
import MainLayout from '../../Shared/MainLayout';

const PermissionForm = () => {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('role-permission-ui.permissions.store'));
    };

    return (
        <MainLayout>
            <Head title="Create New Permission" />

            <div className="container mx-auto px-4 py-8">
                <div className="bg-white shadow-md rounded-lg p-6">
                    <h1 className="text-2xl font-bold mb-6">Create New Permission</h1>
                    
                    <form onSubmit={handleSubmit}>
                        <div className="mb-4">
                            <label htmlFor="name" className="block text-sm font-medium text-gray-700">Permission Name</label>
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

                        <div className="flex justify-between items-center">
                            <button
                                type="submit"
                                disabled={processing}
                                className="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
                            >
                                Save Permission
                            </button>
                            <a href={route('role-permission-ui.permissions.index')} className="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </MainLayout>
    );
};

export default PermissionForm;
