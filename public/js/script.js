// Menu burger
const navbarToggle = document.querySelector('.navbar-toggle');
const navbarMenu = document.querySelector('.navbar-menu');
let isMenuActive = false;

navbarToggle.addEventListener('click', function(event) {
event.stopPropagation();
navbarToggle.classList.toggle('active');
// si on est en mode burger
const isBurger = window.matchMedia("(max-width: 970px)").matches;
if (isMenuActive) {
    navbarMenu.classList.remove('animate-in');
    if (isBurger) {
        navbarMenu.classList.add('animate-out');
        setTimeout(function() {
            navbarMenu.classList.remove('active');
            navbarMenu.classList.remove('animate-out');
        }, 500);
    } else {
        navbarMenu.classList.remove('active');
    }
    isMenuActive = false;
} else {
    navbarMenu.classList.remove('animate-out');
    navbarMenu.classList.add('active', 'animate-in');
    isMenuActive = true;
}
});

document.addEventListener('click', function(event) {
if (!event.target.closest('.navbar-toggle')) {
    const isBurger = window.matchMedia("(max-width: 970px)").matches;
    navbarMenu.classList.remove('animate-in');
    if (isBurger) {
        navbarMenu.classList.add('animate-out');
        setTimeout(function() {
            navbarMenu.classList.remove('active');
            navbarMenu.classList.remove('animate-out');
        }, 500);
    } else {
        navbarMenu.classList.remove('active');
    }
    navbarToggle.classList.remove('active');
    isMenuActive = false;
}
});

// ***************************

// MESSAGES
document.addEventListener("DOMContentLoaded", function() {
  setTimeout(function() {
      let alert = document.querySelector('.custom-alert');
      if(alert) alert.style.display = 'none';
  }, 3000); 
});

// ***************************

// let eyeicon = document.getElementById("eyeicon");
// let password = document.getElementById("password");


// eyeicon.onclick = function(){
//     if(password.type == "password"){
//         password.type = "text";
//     }else {
//         password.type = "password";
//     }
// }



















    

