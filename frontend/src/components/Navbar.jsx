import React from "react";

const Navbar = () => {
    return (
        <nav className="bg-white shadow-md p-4 flex justify-between items-center">
            <h1 className="text-xl font-bold">Bookify</h1>
            <div className="space-x-4">
                <button className="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
                <button className="border px-4 py-2 rounded">Register</button>
            </div>
        </nav>
    );
};

export default Navbar;
