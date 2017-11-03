<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="modal.css">

    <!-- 
    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        
        #myImg:hover {
            opacity: 0.7;
        }
        /* The Modal (background) */
        
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }
        /* Modal Content (image) */
        
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        /* Caption of Modal Image */
        
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        /* Add Animation */
        
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        
        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }
        
        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }
        /* The Close Button */
        
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        /* 100% Image Width on Smaller Screens */
        
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style> -->
</head>

<body>
 
    <h2>Image Modal</h2>

    <img id="myImg" src="images/djpics/th_DJ.gif" onclick="urjsfunction(this);" alt="Trolltunga, Norway" width="300" height="200">
    <img id="myImgs" src="images/djpics/th_djlogo.jpg" onclick="urjsfunction(this);" alt="Trolltunga, Norway" width="300" height="200">


    <!-- The Modal 
    set the id using php variables
    
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    -->
    <?php
    require 'modal.html';
    ?>
     <script type="text/javascript" src="js/modal.js"></script>  
        <script>
            /*
                                                                    // Get the modal
                                                                    var modal = document.getElementById('myModal');


                                                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                                    var img = document.getElementById('myImgs');
                                                                    var modalImg = document.getElementById("img01");
                                                                    var captionText = document.getElementById("caption");

                                                                    function urjsfunction(obj) {
                                                                        modal.style.display = "block";
                                                                        modalImg.src = obj.src;
                                                                        captionText.innerHTML = obj.alt;
                                                                    }

                                                                    // Get the <span> element that closes the modal
                                                                    var span = document.getElementsByClassName("close")[0];

                                                                    // When the user clicks on <span> (x), close the modal
                                                                    span.onclick = function() {
                                                                        modal.style.display = "none";
                                                                    }
                                                               */
        </script>

</body>

</html>