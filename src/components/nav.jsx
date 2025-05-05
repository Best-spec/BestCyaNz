import React, { useState } from "react";

function nav() {
  const [isOpen, setIsOpen] = useState(false);
  return (
    <nav className="py-4 px-8  bg-[#222831] text-white md:h-25">
      <div className="flex justify-between items-center py-4 px-8 ">
        <h1 className="text-xl font-bold pl-5 md:pl-20">Boonyarit</h1>

        <ul className="hidden md:pr-20 md:flex gap-10 text-lg">
          <li>
            <a href="localhost:5173">Home</a>
          </li>
          <li>About</li>
          <li>Contact</li>
        </ul>

        <div className="md:hidden" onClick={() => setIsOpen(!isOpen)}>
          <button>
            <i class="fi fi-br-menu-burger"></i>
          </button>
        </div>
      </div>
      
      {isOpen && (
        <div className="border-2 w-full md:hidden">
          <ul className="flex flex-col items-center">
            <li>
              <a href="localhost:5173">Home</a>
            </li>
            <li>About</li>
            <li>Contact</li>
          </ul>
        </div>
      )}
    </nav>
  );
}

export default nav;
