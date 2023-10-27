//Checkmark
var animation = lottie.loadAnimation({
    container: document.getElementById('lottie-container'),
    renderer: 'svg', 
    loop: false, 
    autoplay: true, 
    path: 'js/successfully-done.json' 
  });

  
  setTimeout(function() {
      window.location.href = "http://localhost:8000/showCours";
  }, 380000); 