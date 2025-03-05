import React from "react";
import profile from "../assets/images/IMG_20250219_190833.jpg";
import arrow_down from "../assets/images/Frame 7.png";
import arrow_c from "../assets/images/Vector 187.png";
import download_CV from "../assets/images/download.png";

function Hero() {
  return (
    <section className="flex h-203 bg-[#222831] border-t-1 border-[#393e46]">
      <div className="pt-60 pl-50">
        <img src={arrow_c} alt="" className="w-17" />
      </div>
      <div className="pt-50">
        <div className="text-white text-7xl font-bold mb-10">
          <h1>PROGRAMER</h1>
          <h1 className="text-[#00ADB5] pt-2">WEB DEVELOPER</h1>
        </div>
        <div className="flex gap-5">
          <div className="bg-[#00ADB5] rounded-full px-5 py-2 transition duration-300 ease-in-out hover:bg-[#393e46]">
            <a className="text-white text-shadow-xl" href="">
              Hire me
            </a>
          </div>
          <div className="flex bg-[#393E46] rounded-full px-5 py-2 transition duration-300 ease-in-out hover:bg-[#393e46]">
            <a className="text-white pr-2" href="">
              Download CV
            </a>
            <img src={download_CV} alt="" />
          </div>
        </div>
        <img src={arrow_down} alt="" className="pl-50 pt-50" />
      </div>
      <div className="pl-80 pt-50">
        <img src={profile} alt="profile" className="size-100 rounded-full" />
      </div>
    </section>
  );
}

export default Hero;
