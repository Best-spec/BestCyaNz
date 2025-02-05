const toggleMenu = document.querySelector(".toggle-menu");
const sidebar = document.querySelector(".sidebar");
const mainContainer = document.querySelector(".main-container");
const backdropFilter = document.querySelector(".backdrop-filter");
const logo = document.querySelector(".logo")
const logoImgLg = document.querySelector(".logo .lg-logo")
const logoImgSm = document.querySelector(".logo .sm-logo")

var barXValues = ["Growth", "Profit", "Sales", "Loss"];
var barYValues = [160000, 140890, 129790, 50000];
var barColors = [
  "rgb(92, 103, 247)",
  "#08fa81",
  "rgb(227, 84, 212)",
  "#fa0828",
];

new Chart("barChart", {
  type: "bar",
  data: {
    labels: barXValues,
    datasets: [
      {
        backgroundColor: barColors,
        data: barYValues,
      },
    ],
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: "World Wine Production 2018",
    },
  },
});

var douXValues = ["Delivered", "Canceled", "Pending", "Returned"];
var douYValues = [1754, 656, 889, 480];
var douColors = [
  "rgb(92, 103, 247)",
  "rgb(227, 84, 212)",
  "rgb(255, 93, 159)",
  "rgb(255, 142, 111)",
];

new Chart("douChart", {
  type: "doughnut",
  data: {
    labels: douXValues,
    datasets: [
      {
        backgroundColor: douColors,
        data: douYValues,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Total 30,000",
    },
  },
});

// TOGGLE ITEMS FUNCTION
const toggleItems = () => {
  logo.classList.toggle("activeLogo")
  logoImgLg.classList.toggle("activeLogoLgImg")
  logoImgSm.classList.toggle("activeLogoSmImg")
  sidebar.classList.toggle("active");
  mainContainer.classList.toggle("active");
  backdropFilter.classList.toggle("active");
};

// TOGGLE MENU EVENT CLICK
toggleMenu.addEventListener("click", toggleItems);
// BACKDROP FILTER EVENT CLICK
backdropFilter.addEventListener("click", toggleItems);
