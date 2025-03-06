window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    const logo = document.getElementById('main-logo');
    const cols = document.querySelectorAll('.a');
    const threshold = 1; // Change this threshold as needed

    if (window.scrollY > threshold) {
      navbar.classList.add('navbar-active');
      logo.src = "assets/images/logo-dark.png";
      cols.forEach(col => col.style.color = "black");
    } else {
      navbar.classList.remove('navbar-active');
      logo.src = "assets/images/logo.png";
      cols.forEach(col => col.style.color = "white");
    }
});












