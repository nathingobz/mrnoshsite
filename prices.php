<?php
  require 'config.php';

  $products = getProd();
//Add product script
    if (isset($_POST['AddNewItem'])){
    $itemname = $_POST['itemname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $totalStock = $_POST['totalStock'];
    try{
      insertProducts(null, $itemname, $description, $price, null, $category, $totalStock);
    }catch(exception $e){
      echo $e;
    }
  }elseif (isset($_POST['UpdateItem'])){
      $id = $_POST['update'];
      $itemname = $_POST['itemname'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category = $_POST['category'];
      $totalStock = $_POST['totalStock'];
    try{
      updateProduct($id, $itemname, $description, $price, $category, $totalStock);
    }catch(exception $e){
      echo $e;
    }
  }elseif (isset($_POST['DeleteItem']))
  {
    deleteProduct($_POST['update']);
  }
  
//testing
  if (isset($_GET['custName'])){

    $i = 0;
    for($i = 0; $i < count($_GET['qty']); $i++){
      echo $_SESSION['productName'][$i].'~'.$_SESSION['chkBox'][$i].'~'.$_GET['qty'][$i].'~'.$_SESSION['price'][$i].'~'.$_SESSION['total'][$i]=$_GET['qty'][$i]*$_SESSION['price'][$i].'<br />';
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
<script>
  function validateSelection(){
    var ids;
    for (var i = 0; i<document.forms["priceList"]["idCount"].value;i++){
       ids = document.getElementByid[i];
        if(ids.checked == false){
          alert("please choose item");
          return false;
        }
    }
  }
  </script>

</head>
<body>
<?php
echo ('<header>');
    require 'banner.html';
echo ('</header>');
require 'menu.php';
?>
<div class="myBody">
<form name="priceList" method="post" action="orderQuotation.php" onsubmit="return validateSelection()">
<div style="text-align:center;
      padding-bottom:10px;">
      <br /><input type="submit" value="Generate Quotation">
       <?php if(isset($_SESSION['userType']))
        {
          if($_SESSION['userType'] == 'Admin')
          {
           echo '||<a href="additem.php">Add Item</a>';
          }
        }
        ?>
      
</div>

<!--table width="100%">
<tr>
<th>#</th><th>Item Name</th><th>Description</th><th>Price</th><th>Category</th><th>#####</th></tr-->
 <div id="table_wrapper">
  <div id="header">
    <div id="head1">Edit</div>
    <div id="head2">Item Name</div>
    <div id="head3">Description</div>
    <div id="head4">Price</div>
    <div id="head5">Category</div>
    <div id="head6">Select</div>
  </div>

  <div id="tbody">
    <table>
      
  <?php

  //$prodcucts = getProd();
      $i = 1;
      foreach ($products as $prod){ ?>
        <tr> 
        <?php if(isset($_SESSION['userType']))
        {
          if($_SESSION['userType'] == 'Admin')
          {
           echo '<td class="td1"><a href="additem.php?change='.$prod ['productID'].'">'.$i.'</a> </td>';
          }else{echo '<td class="td1">'.$i.'</a> </td>';}
        }else{echo '<td class="td1"><b>'.$i.'</b> </td>';}
        ?>
        <!--td class="td1"><a href="additem.php?change=<php echo $prod ['productID']; ?>"><php echo $i; ?></a> </td-->
        <td class="td2"><?php echo $prod ['productName']; ?></td>
        <td class="td3"><?php echo $prod ['productDescription']; ?></td>
        <td class="td4"><?php echo $prod ['productPrice']; ?></td>
        <td class="td5"><?php echo $prod ['prodCategory']; ?></td>
        <td class="td6"><input type="checkbox" name="chkBox[]" id="<?php echo $i ?>" value="<?php echo $prod ['productID']; ?>" />&nbsp;</td></tr>
        <!--td class="td6"><input type="submit" name ="<php echo $prod['productID'];?>" id="<php echo "delete_id". $prod['productID']; ?>" value="<php echo $prod['productID'];?>" onclick="vlid();"/></td></tr-->
    <?php 
    $i = $i+1;
      }
      echo '<input type="hidden" id="idCount" value="'.$i.'">';
  ?>
</table>
</div>
</div>
</form>
</div>

<footer>    

<div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>
    

</footer>
</body>

</html>
