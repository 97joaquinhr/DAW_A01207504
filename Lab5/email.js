var myInput = document.getElementById("mail");
var at = document.getElementById("at");
var com = document.getElementById("com");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var includesAt = /@/g;//regular expression
  if(myInput.value.match(includesAt)) {  
    at.classList.remove("invalid");
    at.classList.add("valid");
  } else {
    at.classList.remove("valid");
    at.classList.add("invalid");
  }
  
  // Validate capital letters
  var includesCom = /\.+[a-z]{2,}/g;
  if(myInput.value.match(includesCom)) {  
    com.classList.remove("invalid");
    com.classList.add("valid");
  } else {
    com.classList.remove("valid");
    com.classList.add("invalid");
  }
}