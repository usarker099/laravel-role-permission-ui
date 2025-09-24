import React from 'react';
import { Link } from '@inertiajs/react';

const MainLayout = ({ children }) => {
    return (
        <div className="min-h-screen bg-gray-100 font-sans antialiased">
            {/* Navigation Bar */}
            <nav className="bg-white shadow-md">
                <div className="container mx-auto px-4">
                    <div className="flex justify-between items-center py-4">
                        <Link href="/" className="text-xl font-bold text-gray-800">
                            Role-Permission UI
                        </Link>
                        <div className="space-x-4">
                            <Link href={route('role-permission-ui.roles.index')} className="text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
                                Roles
                            </Link>
                            <Link href={route('role-permission-ui.permissions.index')} className="text-gray-600 hover:text-indigo-600 transition duration-150 ease-in-out">
                                Permissions
                            </Link>
                        </div>
                    </div>
                </div>
            </nav>

            {/* Main Content Area */}
            <main>
                {children}
            </main>

            {/* Footer */}
            <footer className="bg-gray-800 text-white text-center py-4 mt-8">
                <p>&copy; 2025 Your Package. All rights reserved.</p>
            </footer>
        </div>
    );
};

export default MainLayout;