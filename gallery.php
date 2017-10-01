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
  
<style type="text/css">
    img{
    display:inline-block;
    }
    #photos {
    /* Prevent vertical gaps */
    /*line-height: 1;*/
    
    -webkit-column-count: 5;
    -webkit-column-gap:   1px;
    -moz-column-count:    5;
    -moz-column-gap:      1px;
    column-count:         5;
    column-gap:           1px;  
    }

    #photos img {
    /* Just in case there are inline attributes */
    width: 100% !important;
    height: auto !important;
    }

    @media (max-width: 1200px) {
    #photos {
    -moz-column-count:    4;
    -webkit-column-count: 4;
    column-count:         4;
    }
    }
    @media (max-width: 1000px) {
    #photos {
    -moz-column-count:    3;
    -webkit-column-count: 3;
    column-count:         3;
    }
    }
    @media (max-width: 800px) {
    #photos {
    -moz-column-count:    2;
    -webkit-column-count: 2;
    column-count:         2;
    }
    }
    @media (max-width: 400px) {
    #photos {
    -moz-column-count:    1;
    -webkit-column-count: 1;
    column-count:         1;
    }
    }

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
     <?php
     cssGalleryOut();
     ?>
</div>

<footer>

  <div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>
		
</footer>
</body>
</html>
