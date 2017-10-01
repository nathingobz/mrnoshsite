<?php 
require 'config.php';
   if (isset($_GET ['change']))
    {
      $row = getProductsByKey($_GET ['change']);
      $itemname = $row['productName'];
      $price = $row['productPrice'];
      $description = $row['productDescription'];
      $category = $row['prodCategory'];
      $totalStock = $row['totalStock'];
    }

    /*
    updateProduct($id)
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MRN OSH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="formStyle.css">
  <script type='text/javascript'>
  function validateItems()
  {
    var itemname = document.forms["items"]["itemname"].value;
    var price = document.forms["items"]["price"].value;
    var description = document.forms["items"]["description"].value;
    var totalStock = document.forms["items"]["totalStock"].value;
    var itemname = document.forms["items"]["itemname"].value;

    if (itemname == null || itemname == ""){
      alert("Item name must be filled out!");
      return false;
    }

    if (price == null || price == ""){
      alert("Item price must be filled out!");
      return false;
    }

    if (description == null || description == ""){
      alert("Item description must be filled out!");
      return false;
    }

    if (totalStock == null || totalStock == ""){
      alert("Total stock must be filled out!");
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
<form method="post" action="prices.php" class="formstyle" name="items">

<input type="hidden" name="update" value=<?php if(isset($_GET ['change'])){echo $_GET ['change'];} ?>>


  <table width="450px" align="center"> 
    <tr> 
      <td valign="top"> 
        <label for="ItemName">Item Name: </label> 
      </td> 
      <td valign="top"> 
        <input  type="text" name="itemname" maxlength="50" size="30" value="<?php if(isset($_GET['change'])){echo $itemname;}?>">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="price">Price</label>
      </td>
      <td valign="top">
        <input  type="text" name="price" maxlength="80" size="30" value="<?php if(isset($_GET['change'])){echo $price;}?>">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="description">Description</label>
      </td>
      <td valign="top">
        <textarea name="description" maxlength="1000" cols="32" rows="6"><?php if(isset($_GET['change'])){echo $description;}?></textarea>
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="category">Category</label>
      </td>
      <td valign="top">
        <select name="category" width="80">
         <?php if(isset($_GET['change'])){echo '<option>'.$category.'</option>';} ?>
         <option>Tents</option>
         <option>Chairs</option>
         <option>Tables</option>
         <option>Cuttlery</option>
         <option>Other</option>
        </select> 
      </td>
    </tr>
    <tr>
      <td valign="top">
        <label for="totalStock">Total Stock</label>
      </td>
      <td valign="top">
        <input  type="text" name="totalStock" maxlength="80" size="30"value=<?php if(isset($_GET['change'])){echo $totalStock;} ?>>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
      <?php if(isset($_GET['change'])){echo '<input type="submit" name="UpdateItem" value="update" onclick="return validateItems()"><input type="submit" name="DeleteItem" value="Delete"> ';}else{echo '<input type="submit" name="AddNewItem" value="Add" onclick="return validateItems()"> ';}?>
          
        <div class="my_content_container">
</div>
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

