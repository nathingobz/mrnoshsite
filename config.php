<?php
require_once(__DIR__ . '/../src/PhpConsole/__autoload.php');

// Call debug from PhpConsole\Handler
$handler = PhpConsole\Handler::getInstance();
$handler->start();

//set session 
$lifetime = 60 * 60 * 24 * 14;  //2 weeks in seconds
session_set_cookie_params($lifetime) ;
session_start();

$host ='localhost';
$username = 'root';
$password = '';
$dbname = 'mrn_osh';

@ $db = mysqli_connect($host, $username, $password, $dbname);

$connection_error = $db->connect_error;
if($connection_error != null){
    Echo "hit and error";
    exit;
}
//########################################## Start Bootstrapped Gallery ######################################################

function galleryOut(){
     $dir = "";
        $row = exec('ls -R',$output,$error);
        $cnt = 0;
        while(list(,$row) = each($output)){
            if(strstr($row, '/')){
                $dir = $row;
            }else{
                if($dir <> ""){
                    
                    $fileTypes = array('jpg','png','bmp','JPG','PNG','BMP');
                    $exclude = array('graphix','tents', 'djpics','buttons','css', 'js', 'fonts');
                    $outstr = str_replace('..',"",str_replace(':', "", $dir)) . "/" . $row ;
                    
                    $bool = 0;

                    if(is_file($outstr)){
                        foreach ($exclude as $key) {
                            if(strstr($outstr, $key) ==false){
                                $bool = $bool . ' ' . 0;
                            }else{
                                $bool = $bool . ' ' . 1;
                            }

                        }
                        if (strpos($bool, '1')==false){
                            $cnt = $cnt + 1;
                        print '
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#">
                                    <img src="'. $outstr .'" alt="Image '.$cnt.'"></img>
                                </a>
                            </div>';
                        }
                   } 
                }
            }
        }
}

//############################################# End Bootstrapped Gallery ###################################################

//########################################## Start CSS Gallery ######################################################

function cssGalleryOut(){
    echo '<section id="photos">';
     $dir = "";
        $row = exec('ls -R',$output,$error);
        $cnt = 0;
        while(list(,$row) = each($output)){
            if(strstr($row, '/')){
                $dir = $row;
            }else{
                if($dir <> ""){
                    
                    $fileTypes = array('jpg','png','bmp','JPG','PNG','BMP');
                    $exclude = array('graphix','tents', 'djpics','buttons','css', 'js', 'fonts');
                    $outstr = str_replace('..',"",str_replace(':', "", $dir)) . "/" . $row ;
                    
                    $bool = 0;

                    if(is_file($outstr)){
                        foreach ($exclude as $key) {
                            if(strstr($outstr, $key) ==false){
                                $bool = $bool . ' ' . 0;
                            }else{
                                $bool = $bool . ' ' . 1;
                            }

                        }
                        if (strpos($bool, '1')==false){
                            $cnt = $cnt + 1;
                        print '<img src="'. $outstr .'" onclick="urjsfunction(this);" ></img>';
                        }
                   } 
                }
            }
        }
        echo '</section>';
}

//############################################# End CSS Gallery ###################################################


/*********************************************Product Queries***********************************************/

function getCat(){
    global $db;
    $query = "SELECT prodCategory from products";
    $cat = $db->query($query);
}

function getProd(){
    global $db;
    $query = "SELECT * from products";
    $products = $db->query($query);
    return $products;     
}

//Insert into the products table
function insertProducts($prodID, $prodName, $prodDesc, $prodPrice, $dateAdded, $prodCat, $totalStock){
    
global $db;

    $query = "INSERT Into products(productName, productDescription, productPrice, prodCategory, totalStock)
             VALUES('$prodName', '$prodDesc', $prodPrice, '$prodCat',$totalStock)";
    $success = $db->query($query);
        if($success){
            header("Refresh:0");
        }else{
          
        }

}
//get records from the products table by key
function getProductsByKey($id){
    global $db;
    $getRecord = "SELECT * FROM products where productID = '$id'";
    $success = $db->query($getRecord);
    $row = $success->fetch_array();
    return $row;
    //return $success; 
}

//update records from the products table by key***********************************
function updateProduct($id, $prodName, $prodDesc, $prodPrice, $prodCat, $totalStock){
    global $db;
    $query = "UPDATE products SET productName = '$prodName', 
                productDescription = '$prodDesc', 
                productPrice = $prodPrice,
                prodCategory = '$prodCat',
                totalStock = '$totalStock'
                WHERE productID = '$id'";

    $success = $db->query($query);
    if($success){
            header("Refresh:0");
        }else{
            echo 'We did not insert, your code aint working';
        }
      
    //return $success; 
}

function deleteProduct($id){
    global $db;
    $query = "DELETE FROM products WHERE productID = $id";
    $statement = $db->query($query);
    if($statement){
            header("Refresh:0");
        }else{
            echo 'We did not insert, your code aint working';
        }
        
}

/*************************************************Finish Product Queries***************************************/
/**************************************************Person Queries***********************************************/
function regUser($userType, $firstName, $lastName, $email, $streetAddress, $suburb, $town, $phone, $password){
    global $db;
    $query = "INSERT into users(userType, firstName, lastName, email, streetAddress, suburb, town, phone, password)
            values('$userType', '$firstName', '$lastName', '$email', '$streetAddress', '$suburb', '$town', '$phone', '$password')";
            $success= $db->query($query);
}

//get records from the products table by key
function getUserByID($id){
    global $db;
    $getRecord = "SELECT * FROM users where userID = '$id'";
    $success = $db->query($getRecord);
    $row = $success->fetch_array();
    return $row;
    //return $success; 
}

//get records from the products table by key
function getUserByEmail($email){
    global $db;
    $getRecord = "SELECT * FROM users where email = '$email'";
    $success = $db->query($getRecord);
    $row = $success->fetch_array();
    return $row;
    //return $success; 
}

function deleteUser($id){
    global $db;
    $getRecord = "DELETE FROM users where userID = '$id'";
    $success = $db->query($getRecord);
        if($success){
            header("location: editUsers.php");
        }
}

function getAllUsers(){
    global $db;
    $query = "SELECT * from users";
    $users = $db->query($query);
    return $users;     
}

function login(){
    global $db;
    if(isset($_POST['email'])){
        $userRecord = getUserByEmail($_POST['email']);
        $name = $userRecord['firstName']." ".$userRecord['lastName'];
        $password = $userRecord['password'];
        $passwordEntered = $_POST['password'];
        //echo $password."  ".$passwordEntered;
        if($password === $passwordEntered){
            $_SESSION['userName'] = $name;
            $_SESSION['userType'] = $userRecord['userType'];
            $_SESSION['email'] = $userRecord['email'];
            $_SESSION['userID'] = $userRecord['userID'];
            echo header('Location: index.php');
        }
    }
    
}

function updateUser($userID, $userType, $name, $surname, $email, $strAdd, $suburb, $town, $phone, $password){
    global $db;
    $query = "UPDATE users SET firstName = '$name', 
                lastName = '$surname', 
                email = '$email',
                streetAddress = '$strAdd',
                suburb = '$suburb',
                town = '$town',
                phone = $phone,
                password = '$password',
                userType = '$userType'
                WHERE userID = $userID";

    $success = $db->query($query);

    if($success){
            header("Refresh:0");
        }else{
            //echo 'We did not insert, your code aint working';
            echo $success;
        }
    }

/*************************Orders**********************************/

function insertOrder($orderID, $userID, $custName, $addr, $suburb, $town, $phone, $deliveryDT, $collectDT, $sumTot)
{
     global $db;
    $query = "insert into orders(orderID, userID, customerName, phoneNum,streetAddress, suburb, town, deliveryDate, collectionDate, orderTotal)
            values('$orderID','$userID', '$custName', $phone,'$addr', '$suburb', '$town', '$deliveryDT', '$collectDT', $sumTot)";
            
            try{
                echo "Making order insert";
            $success= $db->query($query);
            
                print $success."failed to insert :".$query;
            }catch(exception $e){
                echo $e->getMessage();
            }

    }

function insertOrderItems($orderID, $itemID, $itemPrice, $itemQty)
{
    global $db;
    $query = "INSERT into orderitems(orderID, productID, itemPrice, quantity)
            values($orderID, $itemID, $itemPrice, $itemQty)";
             try{
                echo $orderID." this is the order ID";
            $success= $db->query($query);
            }catch(exception $e){
                echo $e->getMessage();
            }
}

function submitOrder(){
    global $db;
    if (isset($_POST['custName'])){
        $custName = $_POST['custName'];
        $addr = $_POST['custAdd'];
        $suburb = $_POST['custAdd1'];
        $town = $_POST['custAdd2'];
        $phone = $_POST['custPhone'];
        $orderDT =  date("Y/m/d");
        $deliveryDT = date("Y-m-d H:i:s", strtotime($_POST['deliveryDT']));
        $collectDT = date("Y-m-d H:i:s", strtotime($_POST['collectionDT']));
        $custEmail = $_POST['custEmail'];
        $orderID = $_POST['invoiceNumber'];
        $sumTot = $_POST['sumTotal'];
        $userID = $_POST['hID'];
        
        insertOrder($orderID, $userID, $custName, $addr, $suburb, $town, $phone, $deliveryDT, $collectDT, $sumTot);

        for($i=0;$i<count($_SESSION['chkBox']);$i++){
        insertOrderItems($orderID, $_SESSION['chkBox'][$i], $_SESSION['price'][$i], $_POST['qty'][$i]);
        }
        
    //echo header('Location: prices.php');
  }
}

function getAllOrders()
{
    global $db;
    $query = "SELECT * from orders";
    $orders = $db->query($query);
    return $orders;
}

function getAllOrdersByID($userID)
{
    global $db;
    $query = "SELECT * from orders WHERE userID = '$userID'";
    $orders = $db->query($query);
    return $orders;
}

function getOrderByOrderID($orderNum)
{
    global $db;
    $query = "SELECT * from orders WHERE orderid = '$orderNum'";
    $order = $db->query($query);
    return $order;
}

function getOrderItemsByOrderID($orderNum)
{
    global $db;
    $query = "SELECT * from orderitems WHERE orderID = '$orderNum'";
    $orderitems = $db->query($query);
    return $orderitems;
}

function getOrderInformation($orderID)
{
	global $db;
	$query = "select * "; 
	$query .= "from orders o";
	$query .= "left join orderitems oi on o.orderID = oi.orderID";
	$query .= "left join products p on oi.productID = p.productID";
	$query .= "where o.orderID = '$orderID'";
	$fullOrder = $db->query($query);
    return $fullOrder;
   // select p.productName, p.productPrice, o.customerName, o.orderTotal, oi.itemPrice from orders o left join orderitems oi  on o.orderID = oi.orderID left join products p on oi.productID = p.productID where o.orderID = '160522225522';
}

function getOrdersByDates($fromDate, $toDate){
	global $db;
	
	//select oi.orderid, oi.quantity, p.productname, o.customername, o.streetaddress, o.suburb, o.town, o.deliverydate, o.collectiondate from orders o left join orderitems oi on o.orderid = oi.orderid left join products p on oi.productid = p.productid where o.deliverydate > '2016-05-20' and o.deliverydate < '2016-06-01';
	
	$query = "select oi.orderid, oi.quantity, p.productname, o.customername, o.streetaddress, o.suburb, o.town, o.deliverydate, o.collectiondate";
	$query .= " from orders o";
	$query .= " left join orderitems oi ";
	$query .= " on o.orderID = oi.orderID";
	$query .= " left join products p";
	$query .= " on oi.productID = p.productID";
	$query .= " where o.deliverydate > '$fromDate'";
	$query .= " and o.deliverydate <'$toDate'";
	$ds = $db->query($query);
	return $ds;
}

/*******************************************End Orders********************************/


/************************************* Start Processess ********************************

if (isset($_GET['genDS']) and isset($_GET['startDt']) and isset($_GET['endDt']))
{
	$dsDetail = getOrdersByDates($_GET['startDt'], $_GET['endDt']);
	
 if ($dsDetail->num_rows > 0){
	 
	
	  $i = 0;
	  foreach ($dsDetail as $key)
		{
			//if (isset($_GET['orderid'.$i]) | $_GET['orderid'.$i] == $key['orderid'])
			//{
				$_POST['DS_orderid'.$i] = $key['orderid'];
				//$_POST['DS_prod'.$i] =  $_POST['DS_prod'.$i] .'#-#'. $key['quantity'] ." x ". $key['productname'];
				$_POST['DS_prod'.$i] = $key['quantity'] ." x ". $key['productname'];
				$_POST['DS_cust'.$i] = $key['customername']  .'#-#**'. $key['streetaddress'] .'#-#**'. $key['suburb'] .'#-#'. $key['town'];
				$_POST['DS_ddate'.$i] = $key['deliverydate'];
				$_POST['DS_cdate'.$i] = $key['collectiondate'];
			/*}
			else
			{

				$_POST['DS_orderid'.$i] = $key['orderid'];
				$_POST['DS_prod'.$i] = $key['quantity'] ." x ". $key['productname'];
				$_POST['DS_cust'.$i] = $key['customername']  .'@@@#-#'. $key['streetaddress'] .'#-#'. $key['suburb'] .'#-#'. $key['town'];
				$_POST['DS_ddate'.$i] = $key['deliverydate'];
				$_POST['DS_cdate'.$i] = $key['collectiondate'];
				$i = $i + 1;
			}*
			$i = $i + 1;
		}
		$_POST['rowCount'] = 5;
		
		echo '
		<script type="text/javascript">
		alert('.$i.'fghfghfghfj)
		</script>';
		//echo header('Location: deliverySheet.php');
	}
}


************************************* End Processes ***********************************/

/*******************************************Mail Func********************************/

function send_mail($to, $from, $subject, $body, $is_body_html = false){
        $fromname = 'Administrator';
        $subject =  'Expired - ';
        $headers =  "Date: ".date('r')."\n";
        $headers .= "Return-Path: ".SYSTEM_EMAIL."\n";
        $headers .= "From: ".$fromname."\n";
        $headers .= "Message-ID: <".md5(uniqid(time()))."@pwc.co.za>\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= 'Content-Type: text/html; charset="iso-8859-1"'."\n";
        $body .= $body."<br />".$from;
        mail(ADMIN_EMAIL, $subject, $body, $headers); 
}
/*******************************************End Mail Func********************************/


?>
