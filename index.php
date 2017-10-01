<?php
require 'config.php';

if(isset($_POST['userType'])){
$userType = $_POST['userType']; 
$firstName = $_POST['name'];
$lastName = $_POST['surname'];
$email = $_POST['email'];
$streetAddress = $_POST['strAdd'];
$suburb = $_POST['suburb'];
$town = $_POST['town'];
$phone =  $_POST['phone'];
$password = $_POST['password'];
  if(isset($_POST['UpdateUser'])){
    $userID = $_POST['update'];
    updateUser($userID, $userType, $firstName, $lastName, $email, $streetAddress, $suburb, $town, $phone, $password);
    header('location: editUsers.php');
  }else{
    if(getUserByEmail($email)){
      echo '<script type="text/javascript">
      alert("A user with the email address you enterd already exists, why dont you log in!.");
      window.location.assign("login.php");
    </script>';
    //  header('location: login.php');
      
    }else{
      regUser($userType, $firstName, $lastName, $email, $streetAddress, $suburb, $town, $phone, $password);
      if(isset($_SESSION['userType']))
      {
        if($_SESSION['userType']=='Admin'){
        header('location: editUsers.php');
        }
      }else{header('location: login.php');}
    
    }
    
  }
}
if (isset($_GET['logout']))
{
  $_SESSION = array();
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MRN OSH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="project.css">
  <!--link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
  <style>
  
  </style>

</head>
<body>
<?php
echo ('<header>');
    require 'banner.html';
echo ('</header>');
require 'menu.php';
?>
<div class="myBody">
  <img class="pic" src="images/draping/kids/kids04.jpg"></img>
  <img class="pic" src="images/draping/kids/kids05.jpg"></img>
  <img class="pic" src="images/draping/kids/kids08.jpg"></img>
  <img class="pic" src="images/draping/kids/kids01.jpg"></img>
</div>
<div></div>

<div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span>
</div>


</body>

</html>
