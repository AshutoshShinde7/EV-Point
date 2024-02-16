let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

document.querySelector("#menu-icon").onclick = () => {
  menu.classList.toggle("active");
};

menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};

window.onscroll = () => {
  if (window.scrollY > 0) {
    document.querySelector(".nav").classList.add("active");
  } else {
    document.querySelector(".nav").classList.remove("active");
  }

  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};

// Hide Menu and scroll bar on Scroll

window.onscroll = () => {
  menu.classList.remove("active");
};

// Header

let header = document.querySelector("header");

window.addEventListener("scroll", () => {
  header.classList.toggle("shadow", window.scrollY > 0);
});

// Slider
console.log("Before Swiper Initialization");
var swiper = new Swiper(".vehicle-slider", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  gapbCursor: true,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});
console.log("After Swiper Initialization");