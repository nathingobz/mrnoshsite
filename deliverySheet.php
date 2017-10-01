<?PHP

require 'config.php';

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
  <!-- ************************************ Start Dynamic Order details table ************************************ -->
  
  <table>
	  <?php 
	  
	  if (isset($_GET['genDS']) and isset($_GET['startDt']) and isset($_GET['endDt']))
{
	$dsDetail = getOrdersByDates($_GET['startDt'], $_GET['endDt']);
	if($dsDetail->num_rows === 0){
		echo header('Location: ordersview.php');
	}
	
 if ($dsDetail->num_rows > 0){
	 
	
	  $i = 0;
	  foreach ($dsDetail as $key)
		{
			if($i === 0 | $i === '0' ){
				//Set first record
				$_POST['DS_orderid'.$i] = $key['orderid'];
				$_POST['DS_prod'.$i] = $key['quantity'] ." x ". $key['productname'];
				$_POST['DS_cust'.$i] = $key['customername']  .'<br />'. $key['streetaddress'] .'<br />'. $key['suburb'] .'<br />'. $key['town'];
				$del = explode(" ",$key['deliverydate']);
				$col  = explode(" ",$key['collectiondate']);
				$_POST['DS_ddate'.$i] = $del[0];
				$_POST['DS_cdate'.$i] = $col[0];
				$i = $i + 1;
			
			}else{
				$z = $i - 1;
				if($_POST['DS_orderid'.$z] === $key['orderid']){
					//Set subsequent order details/items
					$_POST['DS_prod'.$z] = $_POST['DS_prod'.$z] .'<br />' . $key['quantity'] ." x ". $key['productname'];
				}else{
					//Set order information after the first r has been set
					$_POST['DS_orderid'.$i] = $key['orderid'];
					$_POST['DS_prod'.$i] = $key['quantity'] ." x ". $key['productname'];
					$_POST['DS_cust'.$i] = $key['customername']  .'<br />'. $key['streetaddress'] .'<br />'. $key['suburb'] .'<br />'. $key['town'];
					$del = explode(" ",$key['deliverydate']);
					$col  = explode(" ",$key['collectiondate']);
					$_POST['DS_ddate'.$i] = $del[0];
					$_POST['DS_cdate'.$i] = $col[0];
					$i = $i + 1;
				}
			}
		}
		$_POST['rowCount'] = $i;

	}
}

	  
	  for ($j = 0; $j < $_POST['rowCount']; $j++)
	  {
	  print '
			
			<tr>
				<td colspan="3" align="right"><b>Order number:</b></td><td>'. $_POST['DS_orderid'.$j].'</td>
			</tr>
			<tr>
			  <td><b>Delivery Date</b></td><td>'.$_POST['DS_ddate'.$j].'</td><td><b>Collection date</b></td><td>'.$_POST['DS_cdate'.$j].'</td>
			</tr>
			<tr>
			  <td><b>KM Reading</b></td><td>_________________</td><td><b>KM reading</b></td><td>_________________</td>
			</tr>
			<tr>
				<td colspan="2" align="Center"><b><u>Customer details</u></b></td><td colspan="2" align="Center"><b><u>Order list</u></b></td>
			</tr>
			<tr>
				<td colspan="2">
					'.$_POST['DS_cust'.$j].'
				</td>
				<td colspan="2">
					'.$_POST['DS_prod'.$j].'
				</td>
			</tr>
			<tr>
				<td><b>Customer signature</b></td><td>_______________________________</td><td>Outstanding amount:</td><td>R_____________</td>
			</tr>
			<tr>
				<td><b>Driver Signature</b></td><td>_______________________________</td><td>Status</td><td><b>Delivered:___ <b>Collected:</b>___</td>
			</tr>
			<tr>
				<td colspan="4"><br />__________________________________________________________________________________________________</td>
			</tr>
			
		'; 
	}
    ?>
    <tr>
		<!--td><b>Driver Signature</b></td><td>*****Buttons come in here*****</td><td>Status</td><td><b>Delivered:___ <b>Collected:</b>___</td-->
	</tr>
  </table>
   <!-- ************************************ End Dynamic Order details table ************************************ -->
   
</form>

<footer>
<div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>
    
</footer>
</div>
</body>

</html>
