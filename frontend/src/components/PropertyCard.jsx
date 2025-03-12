import React from "react";

const PropertyCard = ({ name, price, image, location }) => {
    return (
        <div className="border rounded-lg overflow-hidden shadow-md">
            <img src={image} alt={name} className="w-full h-48 object-cover" />
            <div className="p-4">
                <h2 className="text-xl font-bold">{name}</h2>
                <p className="text-gray-600">{location}</p>
                <p className="text-lg font-semibold mt-2">${price} / night</p>
            </div>
        </div>
    );
};

export default PropertyCard;
