import React from "react";
import Navbar from "./components/Navbar";
import HeroSection from "./components/HeroSection.jsx";
import PropertyList  from "./components/PropertyList.jsx";

function App() {
    return (
        <div>
            <Navbar />
            <HeroSection/>
            <PropertyList/>
            <h1 className="text-center mt-10 text-2xl">Welcome to Bookify</h1>
        </div>
    );
}

export default App;
