<?php
print ('<!DOCTYPE html>
<html lang="en">
<head>
  <title>MRN OSH</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>'
);
$dir = "";
$row = exec('ls -R',$output,$error);
//while(list(,$row) = each($output)){
echo '<html><body>
<!-- Page Content -->
    <div class="container">
	<div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Thumbnail Gallery</h1>
            </div>

	';
$cnt = 0;
while(list(,$row) = each($output)){
	if(strstr($row, '/')){
		$dir = $row;
	//	echo "<BR>";
	}else{
		if($dir <> ""){
			
			$fileTypes = array('jpg','png','bmp','JPG','PNG','BMP');
			$exclude = array('graphix','tents', 'djpics','buttons','css', 'js', 'fonts');
			//$outstr = str_replace('.',"",str_replace(':', "", $dir)) . "/" . $row  . "<BR>\n";
			$outstr = str_replace('..',"",str_replace(':', "", $dir)) . "/" . $row ;
			
			$bool = 0;

			if(is_file($outstr)){
				//if(is_array(getimagesize($outstr))){
					foreach ($exclude as $key) {
					//	echo $key.' ++ '.$outstr.'<br />';
					if(strstr($outstr, $key) ==false){
						$bool = $bool . ' ' . 0;
					}else{
						$bool = $bool . ' ' . 1;
					}
				//}
				//echo '<li>'. $outstr .'</li>';
			}
			if (strpos($bool, '1')==false){
				$cnt = $cnt + 1;
				//echo '<li><img src="'. $outstr .'" alt="Image '.$cnt.'"></img></li>';
			//	echo '<li>'. $outstr .'</li>';
            print '
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#">
                        <img src="'. $outstr .'" alt="Image '.$cnt.'"></img>
                    </a>
                </div>
            ';
			}
		}

			
		}
	}
}
echo '
 </div>

        <hr>
<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body></html>';
if($error){
echo "Error : $error<BR>\n";
exit;
}
echo '</html>';
?>
