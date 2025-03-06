document.addEventListener("DOMContentLoaded", function() {
    var btnSignup = document.querySelector(".btn-signup");
    var loginDropdown = document.querySelector(".login-dropdown");
  
    btnSignup.addEventListener("mouseover", function() {
      loginDropdown.style.display = "block";
    });
  
    btnSignup.addEventListener("mouseout", function() {
      loginDropdown.style.display = "none";
    });
  
    loginDropdown.addEventListener("mouseover", function() {
      loginDropdown.style.display = "block";
    });
  
    loginDropdown.addEventListener("mouseout", function() {
      loginDropdown.style.display = "none";
    });
  });
  