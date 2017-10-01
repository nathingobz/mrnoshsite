<?PHP
//require_once("./include/membersite_config.php");
require 'config.php';

if(isset($_GET['viewOrder'])){
  $orderInfo = getOrderByOrderID($_GET['viewOrder']);
  foreach ($orderInfo as $key) {
    $oid = $key['orderid'];
    $cn =  $key['customerName'];
    $sa =  $key['streetAddress'];
    $sub =  $key['suburb'];
    $tn =  $key['town'];
    $od =  $key['orderDate'];
    $dd =  $key['deliveryDate'];
    $cd =  $key['collectionDate'];
    $ot =  $key['orderTotal'];
    $pn = $key['phoneNum'];
    $tot = $key['orderTotal'];
  }
  $orderItems = getOrderItemsByOrderID($_GET['viewOrder']);
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
function myFunction() {
    window.print();
}

function changeField(vals, fldID){
  document.getElementById(fldID).value = vals;
  alert(vals);
}
</script>


</head>
<body>
<div 
    style="border: darkgray 1px solid;
  width: 900px;
  margin-left: auto;
  margin-right: auto;
  padding: 5px;">
<?php
echo ('<header>');
    require 'banner.html';
echo ('</header>');
require 'menu.php';
?>
  <hr>
  <form method="get" action="<?=$_SERVER['PHP_SELF']?>" name="orders" class="formstyle"> 
  <table style="width:900px" align="center">
    <tr>
      <td>
      <div style="display: block;
    padding-left: 5px;
    padding-right: 100px;
    padding-top:5px;
    padding-bottom:5px;
    border: black 1px solid;
    width:150px;
    float:right;">  9792B Carr Street<br />
    Mzimhlophe<br />
  Orlando west 2<br />
  Soweto<br />
  1804</div>
        
      </td>
      <td align="center">
      c/k2003/003007/<br />
      <img src="images/buttons/nfelog2.jpg" alt="NFE logo" height="50" /><br />
       <b>"Always At your Service"</b> 

      </td>
      <td>
    <div style="display: block;
    padding-left: 100px;
    padding-right: 2px;
    padding-top:5px;
    padding-bottom:5px;
    border: black 1px solid;
    width:150px;
    text-align:right"> 
       P.O Box 83<br />
  Orlando<br />
  1803<br />
  Robert 083 282 5490<br />
  Zodwa 083 378 1300
       </div>


      </td>
    </tr>

  </table>
<hr>
<table style="width:900px" text-align="left" id="table_wrapper">
  <tr>
    <td>Invoice no:</td><td><input type="text" name="invoiceNumber" readonly value="<?php if(isset($_GET['viewOrder'])){echo $oid;}?>"></td><td colspan="2">Customer details</td>
  </tr>
  <tr>
    <td width="150px">Print Time:</td><td><?php echo date("h:i:sa"); ?></td><td width="150px">Name:</td><td><input type="text" name="custName" readonly value="<?php if(isset($_GET['viewOrder'])){echo $cn;} ?>"></td>
  </tr>
  <tr>
    <td>Order Date:</td><td><?php echo $od ?></td><td>Address:</td><td><input type="text" name="custAdd" readonly value="<?php if(isset($_GET['viewOrder'])){echo $sa;}  ?>"></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td><input type="text" name="custAdd1" readonly value="<?php if(isset($_GET['viewOrder'])){echo $sub;} ?>"></td>
  </tr>
  <tr>
    <td>Delivery Date:</td><td><input type="date" name="deliveryDT" readonly value=<?php if(isset($_GET['viewOrder'])){echo $dd;} ?>></td>
    <td></td><td><input type="text" name="custAdd2" readonly value="<?php if(isset($_GET['viewOrder'])){echo $tn;} ?>"></td>
  </tr>
  <tr>
    <td>Collection Date:</td><td><input type="date" name="collectionDT" id="collectionDT"="collectionDT" readonly value=<?php if(isset($_GET['viewOrder'])){echo $cd;} ?>></td>
    <td>Contact Number</td><td><input type="text" name="custPhone" readonly value="<?php if(isset($_GET['viewOrder'])){echo $pn;} ?>"></td>
    <input type="hidden" name="viewOrder" readonly value="<?php if(isset($_GET['viewOrder'])){echo $_GET['viewOrder'];} ?>">
  </tr>
    <tr>
    <td></td><td></td><td></td><td></td>
  </tr>
</table>
<table style="width:900px;
border: darkgray 1px solid;" text-align="left">    
<tr>
    <th width="50px"></th><th>Qty</th><th>Item</th><th>Unit Price</th><th>Total Amount</th>
</tr>
  <?php 
//try{

    if(isset($_GET['viewOrder']))
    {
      foreach ($orderItems as $key) 
        {
          $row = getProductsByKey($key['productID']);
          echo "<tr>
                  <td></td>
                  <td align='center'>".$key['quantity']."</td>
                  <td>".$row['productName']."</td>
                  <td>R ".$key['itemPrice']."</td>
                  <td>R ".$key['quantity']*$key['itemPrice']."</td>
                </tr>";
        }
        echo "<tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total</td>
                  <td>R ".$tot."</td>
                </tr>";
      }
  ?>
    
    <tr>
      <td colspan="5" style="text-align:center">
       
        <button onclick="myFunction()" >Print this page</button><a href="prices.php">Go to Prices</a>
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