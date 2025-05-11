import React, { useState } from "react";

function nav() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <nav className=" w-full bg-[#222831] text-white items-center">
      <div className="flex justify-between items-center py-4 px-6 pr-20 h-25">
        <h1 className="text-xl font-bold pl-20">Boonyarit</h1>
        <button className="md:hidden text-white" 
        onClick={() => setIsOpen(!isOpen)}>
          ☰
        </button>
        <ul className="hidden md:flex gap-10 text-lg">
          <li>
            <a href="localhost:5173">Home</a>
          </li>
          <li>About</li>
          <li>Contact</li>
        </ul>
      </div>
      

      {isOpen && (
        <ul className=" mt-4 space-y-3 justify-center items-center text-lg">
        <li>
          <a href="localhost:5173">Home</a>
        </li>
        <li>About</li>
        <li>Contact</li>
      </ul>
      )}
    </nav>
  );
}

export default nav;
