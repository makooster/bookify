import React from "react";
import PropertyCard from "./PropertyCard";

const properties = [
    {
        id: 1,
        name: "Luxury Hotel",
        location: "New York",
        price: 150,
        image: "https://source.unsplash.com/400x300/?hotel",
    },
    {
        id: 2,
        name: "Cozy Apartment",
        location: "Paris",
        price: 90,
        image: "https://source.unsplash.com/400x300/?apartment",
    },
    {
        id: 3,
        name: "Beach Resort",
        location: "Maldives",
        price: 200,
        image: "https://source.unsplash.com/400x300/?beach",
    },
];

const PropertyList = () => {
    return (
        <div className="p-10">
            <h1 className="text-2xl font-bold mb-6">Available Properties</h1>
            <div className="grid grid-cols-3 gap-6">
                {properties.map((property) => (
                    <PropertyCard key={property.id} {...property} />
                ))}
            </div>
        </div>
    );
};

export default PropertyList;
