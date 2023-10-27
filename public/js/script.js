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

    
// Dropdown behavior for "Cocon"
const dropdown = document.querySelector('.dropdown');
const dropdownMenu = document.querySelector('.dropdown-menu.dropdown-list');
let isDropdownActive = false;

dropdown.addEventListener('click', function(event) {
    event.stopPropagation();
    if (isDropdownActive) {
        dropdownMenu.style.display = 'none';
        isDropdownActive = false;
    } else {
        dropdownMenu.style.display = 'block';
        isDropdownActive = true;
    }
});

// Ensure that the dropdown closes when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown')) {
        dropdownMenu.style.display = 'none';
        isDropdownActive = false;
    }
});

// MESSAGES
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        let dangerAlerts = document.querySelectorAll('.alert-danger');
        let successAlerts = document.querySelectorAll('.alert-success');
        
        dangerAlerts.forEach(function(alert) {
            alert.style.display = 'none';
        });
        
        successAlerts.forEach(function(alert) {
            alert.style.display = 'none';
        });
    }, 4000); 
});


// *********** AOS CANCEL ****************

function updateAOSAttributes() {
    // Select all data-aos
    const aosElements = document.querySelectorAll('[data-aos]');

    if (window.innerWidth <= 1175) {
        // Si width <= a 1175px
        aosElements.forEach(element => {
            element.removeAttribute('data-aos');
            element.removeAttribute('data-aos-duration');
        });
    } else {
        //  // Si width >= a 1175px
        aosElements.forEach(element => {
            if (element.classList.contains('fade-left')) {
                element.setAttribute('data-aos', 'fade-left');
                element.setAttribute('data-aos-duration', '2000');
            } else if (element.classList.contains('fade-right')) {
                element.setAttribute('data-aos', 'fade-right');
                element.setAttribute('data-aos-duration', '2000');
            }
        });
    }
}

window.addEventListener('resize', updateAOSAttributes);

updateAOSAttributes();













