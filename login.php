<?PHP

require 'config.php';

if(isset($_POST['email']))
{
   login();
   if(isset($_SESSION['username'])){
    echo '<script type="text/javascript">
      alert("Redirecting to homepage.");
    </script>';
    
   }else{
    echo '<script type="text/javascript">
      alert("You have entered incorrect login details.");
    </script>';
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>MRN OSH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="formStyle.css">
<script type='text/javascript'>
  function validateLogin()
  {
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;

    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
      
    if (email == null || email == ""){
      alert("Email must be filled out!");
      return false;
    }
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
          alert("Not a valid e-mail address!");
          return false;
    }
    if (password == null || password == ""){
      alert("Password must be filled out!");
      return false;
    }
  }
  </script>
</head>
<body>
<div style="border: darkgray 1px solid;
  width: 900px;
  margin-left: auto;
  margin-right: auto;
  padding: 5px;
  top: 150px;
  left: 0;
  right: 0;
  /* bottom: 0; */
  position: absolute;">
<?php
echo ('<header>');
    require 'banner.html';
echo ('</header>');
require 'menu.php';
?>
<form name="loginForm" action="login.php" class="formstyle" method="post"> 
  <table width="450px"> 
    <tr>
      <td>
        <label for="email">Email address</label>
      </td>
      <td>
        <input  type="text" name="email" maxlength="80">
      </td>
    </tr>
        <tr>
      <td>
        <label for="password">Password</label>
      </td>
      <td>
        <input  type="password" name="password" maxlength="80">
      </td>
    </tr>
    
    <tr>
      <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit" onclick="return validateLogin()">   <input type="reset" value="Reset"><br />
      </td>
    </tr>
  </table>


</form>
<footer>
<div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>
    
</footer>
</div>
</body>
</html>