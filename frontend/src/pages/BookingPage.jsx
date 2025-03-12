import React, { useState } from "react";

const BookingPage = () => {
    const [name, setName] = useState("");
    const [date, setDate] = useState("");
    const [guests, setGuests] = useState(1);

    const handleBooking = (e) => {
        e.preventDefault();
        alert(`Booking confirmed for ${name} on ${date} for ${guests} guests.`);
    };

    return (
        <div className="p-10">
            <h1 className="text-2xl font-bold mb-4">Book Your Stay</h1>
            <form onSubmit={handleBooking} className="space-y-4">
                <input
                    type="text"
                    placeholder="Your Name"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    className="border p-2 w-full"
                />
                <input
                    type="date"
                    value={date}
                    onChange={(e) => setDate(e.target.value)}
                    className="border p-2 w-full"
                />
                <input
                    type="number"
                    min="1"
                    value={guests}
                    onChange={(e) => setGuests(e.target.value)}
                    className="border p-2 w-full"
                />
                <button className="bg-blue-600 text-white px-6 py-2 rounded-md">
                    Confirm Booking
                </button>
            </form>
        </div>
    );
};

export default BookingPage;
