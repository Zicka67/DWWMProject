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

// MESSAGES
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        let alert = document.querySelector('.custom-alert');
        if(alert) alert.style.display = 'none';
    }, 3000); 
});


// CAROUSEL 
// Select all carousel items
var carouselItems = Array.from(document.querySelectorAll('.carousel-item'));

// Init index
var index = 0;

// Add 'active' class to the first 3 items
for (let i = 0; i < 3; i++) {
  carouselItems[i].classList.add('active');
  carouselItems[i].classList.add(getClassByIndex(i)); // Add color class
}

// Change active items every 5 seconds
setInterval(function() {
  // Remove 'active' and color class from the oldest item
  var oldItem = carouselItems[index % carouselItems.length];
  oldItem.classList.remove('active');
  oldItem.classList.remove(getClassByIndex(index % 3)); // Remove color class

  // The next item to activate is (index + 3) % length, because we start counting from 0
  var newItem = carouselItems[(index + 3) % carouselItems.length];
  newItem.classList.add('active');
  newItem.classList.add(getClassByIndex((index + 3) % 3)); // Add color class

  // Move to the next item
  index++;
    
}, 10000);

// Function to get the color class by index
function getClassByIndex(i) {
  switch(i % 3) {
    case 0: return 'first';
    case 1: return 'second';
    case 2: return 'third';
  }
}
















      

  