<?PHP
//require_once("./include/membersite_config.php");
require 'config.php';

$invNum = date("y").date("m").date("d").date("H").date("i").date("s");
// if(isset($_POST['chkBox']))
//  {$_SESSION['chkBox'] = $_POST['chkBox'];}
      if (isset($_POST['submitButton'])) {
        $custName = $_POST['custName'];
        $addr = $_POST['custAdd'];
        $suburb = $_POST['custAdd1'];
        $town = $_POST['custAdd2'];
        $phone = $_POST['custPhone'];
        $orderDT =  date(‘Y-m-d’,strtotime(date));
        //$deliveryDT = $_POST['deliveryDT'];
        //$collectDT = $_POST['collectionDT'];

        $deliveryDT =  date(‘Y-m-d’,strtotime($_POST['delDT']));
        $collectDT = date(‘Y-m-d’,strtotime($_POST['collDT']));
        $custEmail = $_POST['custEmail'];
        $orderID = $_POST['invoiceNumber'];
        $sumTot = $_POST['sumTotal'];
        $userID = $_POST['hID'];\
       // insertOrder($orderID, $userID, $custName, $addr, $suburb, $town, $phone, $deliveryDT, $collectDT, $sumTot);
      submitOrder();
      header('location: ordersview.php');
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
 // alert(vals);
}
function validateQoutation()
  {
    var name = document.forms["orders"]["custName"].value;
    var custAdd = document.forms["orders"]["custAdd"].value;
    var custPhone = document.forms["orders"]["custPhone"].value;
    var delDT = document.forms["orders"]["delDT"].value;
    var collDt = document.forms["orders"]["collDT"].value;
      
    if (name == null || name == ""){
      alert("Name must be filled out");
      return false;
    }
    
    if (custAdd == null || custAdd == ""){
      alert("Street Address must be filled out");
      return false;
    }
    if (custPhone == null || custPhone == ""){
      alert("Contact must be filled out");
      return false;
    }
    if (delDT == null || delDT == ""){
      alert("Delivery date must be filled out");
      return false;
    }
    if (collDt == null || collDt == ""){
      alert("Collection date must be filled out");
      return false;
    }

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
  <form method="post" action="<?=$_SERVER['PHP_SELF']?>" name="orders" class="formstyle"> 
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
    <td>Invoice no:</td><td><input type="number" name="invoiceNumber" value=<?php if(isset($_POST['invoiceNumber'])){echo $_POST['invoiceNumber'];}else{echo $invNum;} ?> readonly></td><td colspan="2">Customer details</td><!--?php if(isset($_POST['custName'])){echo $_POST['custName']} ?-->
  </tr>
  <tr>
    <td width="150px">Time:</td><td><?php echo date("h:i:sa"); ?></td><td width="150px">Name:</td><td><input type="text" name="custName" value="<?php if(isset($_POST['custName'])){echo $_POST['custName'];} ?>"></td>
  </tr>
  <tr>
    <td>Order Date:</td><td><?php echo date("Y/m/d"); ?></td><td>Address:</td><td><input type="text" name="custAdd" value="<?php if(isset($_POST['custAdd'])){echo $_POST['custAdd'];} ?>"></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td><input type="text" name="custAdd1" value="<?php if(isset($_POST['custAdd1'])){echo $_POST['custAdd1'];} ?>"></td>
  </tr>
  <tr>
    <td>Delivery Date:</td><td><input type="date" name="deliveryDT" onchange='changeField(this.value,"delDT")' value="<?php if(isset($_POST['deliveryDT'])){echo $_POST['deliveryDT'];} ?>"></td>
    <td></td><td><input type="text" name="custAdd2" value="<?php if(isset($_POST['custAdd2'])){echo $_POST['custAdd2'];} ?>"></td>
  </tr>
  <tr>
    <td>Collection Date:</td><td><input type="date" name="collectionDT" id="collectionDT"="collectionDT" onchange='changeField(this.value,"collDT")' value="<?php if(isset($_POST['collectionDT'])){echo $_POST['collectionDT'];} ?>"></td>
    <td>Contact Number</td><td><input type="number" name="custPhone" value="<?php if(isset($_POST['custPhone'])){echo $_POST['custPhone'];} ?>"></td>
  </tr>
    <tr>
    <td><input type="hidden" name="delNM" id="delDT" value=<?php if(isset($_POST['delNM'])){echo $_POST['delNM'];} ?>></td><td><input type="hidden" name="collNM" id="collDT" value="<?php if(isset($_POST['collNM'])){echo $_POST['collNM'];} ?>"></td>
    <td></td><td><input type="hidden" name="custEmail" value="<?php if(isset($_POST['custEmail'])){echo $_POST['custEmail'];} ?>"></td>
  </tr>
</table>
<table style="width:900px;
border: darkgray 1px solid;" text-align="left">    
<tr>
    <th width="50px"></th><th>Qty</th><th>Item</th><th>Unit Price</th><th>Total Amount</th>
</tr>
  <?php 
//try{

    if(isset($_POST['chkBox']))
    {
      $i = 0;
      $_SESSION['chkBox'] = $_POST['chkBox'];
      {$vals = $_POST['chkBox'];
        foreach ($vals as $key) 
        {
         
          $row = getProductsByKey($key);
          $pr[$i] = $row['productPrice'];
          $pn[$i] = $row['productName'];
          echo "<tr>
                  <td></td>
                  <td align='center'><input type='number' name='qty[]' max='1000' style='width:50px' min='1' required></td>
                  <td>".$row['productName']."</td>
                  <td>R ".$row['productPrice']."</td>
                  <td align='center'>R <input type='number' name'total[]' value='0' readonly></td>
                </tr>";
          $i = $i+1;
        }
        $_SESSION['price'] = $pr;
        $_SESSION['productName'] = $pn;
        $_SESSION['invoiceNum'] = $invNum;
      }
    }elseif (isset($_POST['calcButton']))
    {
      if(isset($_POST['qty']))
      {
        $sumTotal = 0;
        $i = 0;
        for($i = 0; $i < count($_POST['qty']); $i++){
          $tot = $_POST['qty'][$i]*$_SESSION['price'][$i];
          $qty = $_POST['qty'][$i];
          $sumTotal = $sumTotal+$tot;
         
           echo "<tr>
                      <td></td>
                      <td align='center'><input type='number' name='qty[]' max='1000' style='width:50px' value='".$qty."'></td>
                      <td>".$_SESSION['productName'][$i]."</td>
                      <td>R ".$_SESSION['price'][$i]."</td>
                      <td align='center'>R <input type='number' name='total[]' value='".$tot."' readonly></td>
                    </tr>";
        }
        echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td>Total:</td><td align='center'>R <input type='number' name='sumTotal' value=".$sumTotal." readonly></td>";
      }
    }
  ?>
    
    <tr>
      <td colspan="5" style="text-align:center">
       <?php if(isset($_SESSION['userType']))
          {
          echo "<input type='hidden' name='hID' value=".$_SESSION['userID'].">";
           echo '<input type="submit" name="submitButton" value="Submit Order" onclick="return validateQoutation()">';
          }
        ?>
        <button onclick="myFunction()" name="calcButton"  value="Update Total">Print this page</button><input type="submit" name="calcButton" value="Update Total"><br /><a href="prices.php">Go to Prices</a>
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