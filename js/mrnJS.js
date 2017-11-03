

function validateLogin()
{
  var email = document.forms["loginForm"]["email"].value;
  var password = document.forms["loginForm"]["password"].value;
  var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    
  if (email == null || email == ""){
    alert("Email must be filled out");
    return false;
  }
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
        return false;
  }
  if (password == null || password == ""){
    alert("password must be filled out");
    return false;
  }
}

