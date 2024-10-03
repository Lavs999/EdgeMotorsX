
/*Animación del menú hamburguesa*/

document.querySelector(".bars__menu").addEventListener("click", () => {

var line1__bars = document.querySelector(".line1__bars-menu");
var line2__bars = document.querySelector(".line2__bars-menu");
var line3__bars = document.querySelector(".line3__bars-menu");
var container__menu = document.querySelector(".menu");

    line1__bars.classList.toggle("activeline1__bars-menu");
    line2__bars.classList.toggle("activeline2__bars-menu");
    line3__bars.classList.toggle("activeline3__bars-menu");

    container__menu.classList.toggle("menu__active");
    
});



 /*Cambiar color del menu al hacer Scroll*/

window.onscroll = function(){

    scroll = document.documentElement.scrollTop;

    header = document.querySelector("header");

    if (scroll > 100){
        header.classList.add('header__active');
    }else if (scroll < 100){
        header.classList.remove('header__active');
    }

}


/** Hacer que los enlaces del menú de navegación reaccionen y cambien dependiendo de la posición de la página*/

const containerScreen = document.querySelectorAll(".div__offset");
const barNavegation = document.querySelectorAll("nav ul li a");
window.addEventListener("scroll", () => {
  containerScreen.forEach((section) => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.clientHeight;
    if (window.scrollY >= sectionTop - sectionHeight / 5) {
      const current = section.getAttribute("id");
      barNavegation.forEach((a) => {
        a.classList.remove("active");
        if (a.classList.contains(current)) {
          a.classList.add("active");
        }
      });
    }
  });
});



