import React from "react";

function nav() {
  return (
    <nav className="flex justify-between items-center py-4 px-8 bg-[#222831] text-white pr-50 h-25">
      <h1 className="text-xl font-bold pl-20">Boonyarit</h1>
      <ul className="flex gap-10 text-lg">
        <li>
          <a href="localhost:5173">Home</a>
        </li>
        <li>About</li>
        <li>Contact</li>
      </ul>
    </nav>
  );
}

export default nav;
