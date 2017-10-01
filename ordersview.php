<?PHP
//require_once("./include/membersite_config.php");

require 'config.php';

  if($_SESSION['userType'] == 'Admin')
  {
    $orders = getAllOrders();
  }else{
    $orders = getAllOrdersByID($_SESSION['userID']);
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
<div>
	<form name="generateDS" method="get" action="deliverySheet.php">
	<table>
		<tr>
			<td>Select Orders from:</td>
			<td><input type="date" name="startDt" ></td>
			<td>To:</td>
			<td><input type="date" name="endDt" ></td>
			<td><input type="submit" name="genDS" value="Generate Delivery Sheet"></td>
		</tr>
	</table>
	</form>
</div>
<div id="table_wrapper">
  <div id="header1">
    <div id="head11">##</div>
    <div id="head12">Order Number</div>
    <div id="head13">Address</div>
    <div id="head14">Order Date</div>
    <div id="head15">Delivery Date</div>
    <div id="head16">Total</div>
  </div>

  <div id="tbody">
    <table>
      
  <?php

  //$prodcucts = getProd();
      $i = 1;
      foreach ($orders as $order){ ?>
        <tr> 
        <?php echo '<td class="td11"><a href="invoice.php?viewOrder='. $order ['orderid'].'" > '.$i.' </a> </td>' ?>
        
        <td class="td12"><?php echo $order ['orderid']; ?></td>
        <td class="td13"><?php echo $order ['streetAddress']; ?></td>
        <td class="td14"><?php echo $order ['orderDate']; ?></td>
        <td class="td15"><?php echo $order ['deliveryDate']; ?></td>
        <td class="td16">R <?php echo $order ['orderTotal']; ?></td></tr>
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
