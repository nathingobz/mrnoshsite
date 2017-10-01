<?php
require 'config.php';

if(isset($_GET['update']) | isset($_GET['editProf']))
{
  if(isset($_GET['editProf'])){
    $user = getUserByID($_SESSION['userID']);
  }else{
    $user = getUserByID($_GET['update']);
  }
  
  $userID = $user['userID'];
  $acl = $_SESSION['userType'];
  $name = $user['firstName'];
  $surname =  $user['lastName'];
  $email =  $user['email'];
  $phone =  $user['phone'];
  $strAdd = $user['streetAddress'];
  $suburb =  $user['suburb'];
  $town = $user['town'];
  $phone = $user['phone'];

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
  function validateRegistration()
  {
    var name = document.forms["register"]["email"].value;
    var surname = document.forms["register"]["surname"].value;
    var email = document.forms["register"]["email"].value;
    var strAdd = document.forms["register"]["strAdd"].value;
    var suburb = document.forms["register"]["suburb"].value;
    var town = document.forms["register"]["town"].value;
    var password = document.forms["register"]["password"].value;

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
    if (name == null || name == ""){
      alert("Name must be filled out");
      return false;
    }
    if (surname == null || surname == ""){
      alert("Surname must be filled out");
      return false;
    }
    if (strAdd == null || strAdd == ""){
      alert("Street Address must be filled out");
      return false;
    }
    if (suburb == null || suburb == ""){
      alert("Suburb must be filled out");
      return false;
    }
    if (town == null || town == ""){
      alert("Town must be filled out");
      return false;
    }
    if (password == null || password == ""){
      alert("Password must be filled out");
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

    <form action="index.php" name="register" class="formstyle" onsubmit="return validateRegistration()" method="POST"> 
    <input type="hidden" name="update" value="<?php if(isset($_GET['update'])){echo $_GET['update'];}elseif(isset($_GET['editProf'])){echo $_SESSION['userID'];}?>">
    
      <table width="450px"> 
        <tr> 
          
          <?php if(isset($_SESSION['userType']))
          {
            if ($_SESSION['userType']=='Admin')
            {
              echo '<td>User Access:</td><td><select name="userType" >
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
              </select>';
            }
          }else{
            echo '<input type="hidden" name="userType" value="User">';
            }?></td>
        </tr>
        <tr> 
          <td><label for="name">Name: </label></td> 
          <td><input  type="text" name="name" maxlength="50" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $name;}?>"></td>
        </tr>
        <tr>
          <td><label for="surname">Surname</label></td>
          <td><input  type="text" name="surname" maxlength="80" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $surname;}?>"></td>
        </tr>
        <tr>
          <td><label for="email">Email address</label></td>
          <td><input  type="text" name="email" maxlength="80" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $email;}?>"></td>
        </tr>
        <tr>
          <td><label for="phone">Phone</label></td>
          <td><input  type="number" name="phone" maxlength="80" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $phone;}?>"></td>
        </tr>
        <tr>
          <td><label for="strAdd">Street Address</label></td>
          <td><input  type="text" name="strAdd" maxlength="80" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $strAdd;}?>"></td>
        </tr>
        <tr>
          <td><label for="email">Suburb</label></td>
          <td><input  type="text" name="suburb" maxlength="80" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $suburb;}?>"></td>
        </tr>
        <tr>
          <td><label for="town">Town</label></td>
          <td><input  type="text" name="town" maxlength="80" value="<?php if(isset($_GET['update']) | isset($_GET['editProf'])){echo $town;}?>"></td>
        </tr>
          <td><label for="password">Password</label></td>
          <td><input  type="password" name="password" maxlength="80"></td>
        </tr>
        <tr>
          <td><label for="confirm">Confirm Password</label></td>
          <td><input  type="password" name="confirm" maxlength="80"></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:center">
         <?php if(isset($_GET['update']) | isset($_GET['editProf']))
            {echo '<input type="submit" name="UpdateUser" value="Update User">';}else{echo '<input type="submit" name="NewUser "value="Register">';} ?>
            <input type="reset" value="Reset"><br />
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