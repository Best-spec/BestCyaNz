import React from "react";
import back_g from "../assets/images/doodle items.png";
import people_1 from "../assets/images/Group 62.png";
import sha_p from "../assets/images/Ellipse 3.png";
function about() {
  return (
    <about className="flex bg-[#222831] h-203">
      <div className="pt-40 pl-60 w-160">
        <div className="flex pr-2 text-white text-7xl font-bold pb-10">
          <h1>About</h1>
          <h1 className="pl-5 text text-[#00ADB5]">me</h1>
        </div>
        <div className="w-100">
          <p className="text-white text-2xl">
            I am an enthusiastic and dedicated individual committed to
            continuous skill development. I specialize in utilizing search
            engines, crafting AI prompts, coding, and adapting to emerging
            technologies.
          </p>
        </div>
      </div>
      <div className="relative w-160 h-160">
        <img src={back_g} className="absolute left-100 top-30" alt="" />
        <img src={sha_p} className="absolute left-130 top-166" alt="" />
        <img src={people_1} className="absolute left-120 top-80" alt="" />
      </div>
    </about>
  );
}

export default about;
