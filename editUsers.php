<?PHP
//require_once("./include/membersite_config.php");

require 'config.php';

$users = getAllUsers();

if (isset($_POST['UserEdit'])){
  $userID = $_POST['UserEdit'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $strAdd = $_POST['strAdd'];
  $suburb = $_POST['suburb'];
  $town = $_POST['town'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $userType = $_POST['userType'];

  updateUser($userID, $userType, $name, $surname, $email, $strAdd, $suburb, $town, $phone, $password);

}

if(isset($_GET['Delete'])){
  if($_SESSION['userType'] == 'Admin')
  {
    deleteUser($_GET['Delete']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MRN OSH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="project.css">

</head>
<body>
  
<?php
echo ('<header>');
    require 'banner.html';
echo ('</header>');
require 'menu.php';
?>

<div id="table_wrapper">
  <div id="header1">
    <div id="head11">Edit</div>
    <div id="head12">Name</div>
    <div id="head13">Surname</div>
    <div id="head14">Email</div>
    <div id="head15">Cell Number</div>
    <div id="head16">Del.</div>
  </div>

  <div id="tbody">
    <table>
      
  <?php

  //$prodcucts = getProd();
      $i = 1;
      foreach ($users as $user){ ?>
        <tr> 
        <td class="td11"><a href="register.php?update=<?php echo $user['userID']; ?>"><?php echo $i; ?></a> </td>
        <td class="td12"><?php echo $user ['firstName']; ?></td>
        <td class="td13"><?php echo $user ['lastName']; ?></td>
        <td class="td14"><?php echo $user ['email']; ?></td>
        <td class="td15"><?php echo $user ['phone']; ?></td>
        <td class="td16"><a href="editUsers.php?Delete=<?php echo $user['userID']; ?>">Delete</a></td></tr>
        <!--td class="td6"><input type="submit" name ="<php echo $prod['productID'];?>" id="<php echo "delete_id". $prod['productID']; ?>" value="<php echo $prod['productID'];?>" onclick="vlid();"/></td></tr-->
    <?php 
    $i = $i+1;
      }
  ?>
</table>
</div>
</div>

<footer>
<div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>
    
</footer>
</div>
</body>
</html>