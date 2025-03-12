import React from "react";

const HeroSection = () => {
    return (
        <div className="bg-blue-500 text-white text-center py-20">
            <h1 className="text-4xl font-bold mb-4">Find Your Perfect Stay</h1>
            <p className="mb-6">Book hotels, apartments, and more at the best prices.</p>
            <div className="bg-white p-3 rounded-md inline-flex">
                <input
                    type="text"
                    placeholder="Where are you going?"
                    className="px-4 py-2 w-64 text-black border-none outline-none"
                />
                <button className="bg-blue-600 px-6 py-2 text-white rounded-md">
                    Search
                </button>
            </div>
        </div>
    );
};

export default HeroSection;
