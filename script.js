var navBar = document.querySelector("#level-1 nav");

window.onscroll = () => {
  console.log(window.pageYOffset);
  if (window.pageYOffset > 600) {
    navBar.classList.add("show");
  }

  if (window.pageYOffset < 600) {
    navBar.classList.remove("show");
  }
};

const msg = document.querySelector(".msg");
const sumbitbtn = document.getElementById("submitbtn");

msg.addEventListener("focus", submsg);

function submsg() {
  sumbitbtn.style.display = "block";
  sumbitbtn.style.animation = "slide 0.5s ease-in-out";
}
