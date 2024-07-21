console.log("Script loaded");
function show()
{
  document.getElementById('lg').style.visibility= 'visible';
}
function hide()
{
  document.getElementById('lg').style.visibility= 'hidden';
}
let slideIndex = 0;
let timeoutId = null;
const slides = document.getElementsByClassName("mySlides");

showSlides();

function plusSlides(step) {
    clearTimeout(timeoutId);
    slideIndex += step - 1;
    if (slideIndex >= slides.length) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = slides.length - 1; }
    showSlides();
}

function showSlides() {
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex >= slides.length) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = slides.length - 1; }
    slides[slideIndex].style.display = "block";
    timeoutId = setTimeout(showSlides, 3000); 
}
function menutoggle2() {
  var navMenu = document.getElementById("MenuItems");
  navMenu.classList.toggle("active");
}
var MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = "0px";

function menutoggle() {
  if (MenuItems.style.maxHeight == "0px") {
    MenuItems.style.maxHeight = "200px";
  } else {
    MenuItems.style.maxHeight = "0px";
  }
 
}

window.onload = function () {
  var t = document.title;
  var i = 1;

  function scrollTitle() {
    var len = document.title.length;
    if (len == 0) {
      i = 0;
    }
    document.title = t.substring(i, t.length);
    i++;
    setTimeout(scrollTitle, 200);
  };

  scrollTitle();
};
