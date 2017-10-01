<!DOCTYPE html>
<html lang="en">
   
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <style>
      html{width:900px;}
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
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
<a href="images/draping/kids/kids5.jpg">
<img src="images/draping/kids/kids5.jpg"  data-toggle="modal" data-target="#myModal">
</a>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      <div class="modal-body">
        <p><img src="images/draping/kids/kids5.jpg"></p>
      </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
<iv class="container">
  <h2>Image Gallery</h2>
  <p>The .thumbnail class can be used to display an image gallery.</p>
  <p>The .caption class adds proper padding and a dark grey color to text inside thumbnails.</p>
  <p>Click on the images to enlarge them.</p>
  <iv class="row">
    <div class="col-lg-15">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
          <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">
          <div class="caption">
             <?php
      require_once 'config.php';
      galleryOut();
    ?>
          <div>
        </a>
      </div>
    </div>
    
    </div>
  </div>
  </div>
  
</div>

</body>
</html>