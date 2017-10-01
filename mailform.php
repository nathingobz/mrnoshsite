<?php
require 'config.php';
if(isset($_Post['sendMail'])){
try{
 send_mail("info@mrnosh.co.za", $_POST['email'], "Enquiry from ".$_POST['name'], $_POST['comments']);
}catch(exception $e){
  return $e->getMessage();
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
  <script>
  function validateMail()
  {
    var email = document.forms["contactform"]["email"].value;
    var name = document.forms["contactform"]["name"].value;
    var number = document.forms["contactform"]["telephone"].value;
    var comments = document.forms["contactform"]["comments"].value;

    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
      
    if (name == null || name == ""){
      alert("Name must be filled out!");
      return false;
    }

    if (email == null || email == ""){
      alert("Email must be filled out!");
      return false;
    }
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
          alert("Not a valid e-mail address!");
          return false;
    }
    
    if (number == null || number == ""){
      alert("Telephone must be filled out!");
      return false;
    }

    if (comments == null || comments == ""){
      alert("Mail body must be filled out!");
      return false;
    }
  }
  </script>
</head>
<body>
<div style="border: darkgray 1px solid;
  width: 900px;
  height:450px;
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

<form name="contactform" method="post" action="mailform.php" class="formstyle">
<table width="450px">
<tr>
 <td valign="top"><label for="first_name">Name *</label></td>
 <td valign="top"><input  type="text" name="name" maxlength="50" size="30"></td>
</tr>

<tr>
 <td valign="top"><label for="email">Email Address *</label></td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="31" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" name="sendMail" value="Send" onclick="return validateMail()">   <input type="reset" value="Clear"><br />
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

