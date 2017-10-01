<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="menu.css">
<nav>
      <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="prices.php">Prices</a></li>
        <?php if(isset($_SESSION['userName'])){
            echo '<li><a href="ordersView.php">View Orders</a></li>';} ?>
		<li>|</li>    
		<li>|</li>
        <li><a >Other Actions...</a>
          <ul>
           <?php if(isset($_SESSION['userName'])){
            echo '<li><a href="index.php?logout=true">Logout</a></li>
            <li><a href="register.php?editProf=0">Edit Profile</a></li>';
          }else{
            echo '<li><a href="login.php">Login</a></li>';
          }
          ?>
          <?php if(isset($_SESSION['userType'])){
            if($_SESSION['userType'] == 'Admin'){
              echo '<li><a href="register.php">Register User</a></li>';
              }
                }else{
               echo '<li><a href="register.php">Register</a></li>';} ?>
            
            <li><a href="mailform.php">Send Enquiry</a></li>
            
            
            <?php if(isset($_SESSION['userType'])){
              if($_SESSION['userType'] == 'Admin'){
              echo '<li><a href="editUsers.php">Edit Users</a></li>';
              }} ?>
          </ul>
        </li>
         <?php if(isset($_SESSION['userName'])){
          echo '<li>|</li>    
          <li>|</li>
          <li><output type="text">';
          echo  "Hi: ".$_SESSION['userName'];
          echo '</output></li>';
         }
          ?>
        
        
      </ul>
</nav>
</head>
</html>