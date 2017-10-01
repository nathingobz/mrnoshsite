<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MRN OSH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="project.css">
  <!--link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
  <style type="text/css">
  span{color: #ff0000;}
/*Contact details on the conctact us page*/
.contact{font-size:20px;
    font-weight:bold;}

.blue{color: black;
    text-align: center;
    border-style: solid;
    border-width: thin;
    border-color: darkgray;
    font-weight:600;}
  </style>

</head>
<body>
<?php
echo ('<header>');
    require 'banner.html';
echo ('</header>');
require 'menu.php';
?>

<div class="myBody">
  <table>
    <tr>
      
      <td colspan="2">
        <img src="images/graphix/maps02.JPG" alt="Map to NFE" />
      </td>
    </tr>
    <tr>
      <td>
      <pre class="contact">
      9792B Carr street
      Orlando West II
      SOWETO
        </pre>
        
      </td>
    
      <td>
        <pre class="contact">
        Robert: 083 282 5490
        Zodwa: 083 378 1300
        <a href="mailto:robert@ngobenifunctions.co.za">Email Us</a>
        </pre>
      </td>
    </tr>
  </table>
</div>

<footer>
<div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>		
</footer>
</body>
</html>
