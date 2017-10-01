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
  <script type="text/javascript">
      var num=3;

      // format: src, alt, text
      imgArray = 
      [  
        ['images/draping/weddings/wed01.jpg', 'Wedding decor pictures', 'Text for Picture 1'],
        ['images/draping/weddings/wed02.jpg', 'Wedding decor pictures', 'Text for Picture 2'],
        ['images/draping/weddings/wed03.jpg', 'Wedding decor pictures', 'Text for Picture 3'],
        ['images/draping/weddings/wed04.jpg', 'Wedding decor pictures', 'Text for Picture 4'],
        ['images/draping/weddings/wed05.jpg', 'Wedding decor pictures', 'Text for Picture 5'],
        ['images/draping/weddings/wed06.jpg', 'Wedding decor pictures', 'Text for Picture 6'],
        ['images/draping/weddings/wed07.jpg', 'Wedding decor pictures', 'Text for Picture 7'],
        ['images/draping/weddings/wed08.jpg', 'Wedding decor pictures', 'Text for Picture 8'],
        ['images/draping/weddings/wed09.jpg', 'Wedding decor pictures', 'Text for Picture 9'],
        ['images/draping/weddings/wed10.jpg', 'Wedding decor pictures', 'Text for Picture 10'],
        ['images/draping/weddings/wed10.jpg', 'Wedding decor pictures', 'Text for Picture 10']

      ]

      function LimitNumber(value) 
      {
        if (value < 0) { value = imgArray.length - 1; }
        var value = value % imgArray.length;
        return value; 
      }
      function slide(slide_num,mypic,mylbl) 
      {
        document.getElementById(mypic).src=imgArray[slide_num][0];
        document.getElementById(mypic).alt=imgArray[slide_num][1];
        document.getElementById(mylbl).innerHTML=imgArray[slide_num][2];
      }
      function DisplaySlides(snos)
      {
        var tmp = new Array();
        tmp = snos.split(',');
        var SNo = num;
        for (i=0; i<tmp.length; i++) 
        {
          SNo = LimitNumber(i+num);
          //    alert(SNo+' : '+SNo+' : mypic'+tmp[i]+' : mlbl'+tmp[i]);
          slide(SNo,'mypic'+tmp[i],'mylbl'+tmp[i]);
        }
      }
      function MoveUp(snos) 
      {
        num = LimitNumber(num+1); DisplaySlides(snos);
      }

      function MoveDown (snos) 
      {
        num = LimitNumber(num-1); DisplaySlides(snos);
      }

      function Enlarge(sno) 
      {
        //  alert("Slide:"+sno);
        slide(sno,'mypic','mylbl');
      }
      function ImgColumn() 
      {
        var str = '';
        for (var i=0; i<imgArray.length; i++) 
        {
          str += '<div onMouseOver="Enlarge('+i+')">';
          my_pic = 'mypic'+i; 
          //    my_src = imgArray[i][0];    // not used here
          str += '<IMG id="'+my_pic+'" SRC="'+imgArray[i][0]+'" value="'+i+'"';
          str += ' alt="'+imgArray[i][1]+'" BORDER="0" HEIGHT="40" WIDth="80">';
          str += '</div>';
        }
        return str;
      }
      //Function to get the date
      function todays(){
        //declare variable and assign the date class
        var tdate = new Date();
        //declare variable day and assign the date number to it
        var day = tdate.getDate();
        //declare variable mm and assign the month number to it
        var mm = tdate.getMonth();
        //declare variable yy and assign the year number to it
        var yy = tdate.getFullYear();
        //assign the day, mm and yy variable to the today seperated by a forward slash
        today = day + "/" + mm + "/" + yy;
        //returns the date is such a format 15/12/2012
        return today;
      }
    </script>
<style type="text/css">

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
            <td>
              <script type="text/javascript">
              document.write(ImgColumn());
              </script>
            </td>
            <th valign="top">
              <div class="slide">
                <img id="mypic" SRC="images/draping/weddings/wed12.jpg" alt="White and cream" border="0" height="500px" width="850px" />
                
              </div>
            </th>
          </tr>
        </table>
</div>

<footer>

  <div class="blue">YOUR ONE STOP HIRING SERVICES <br />FOR: MARQUEES, CHAIRS, TABLES, CATERING SERVICES, 
      DRAPING,DECORATIONS, <br />TABLE SETTING, FLOODLIGHTS, P.A &amp; SOUND SYTEMS, ETC…<br /> <span>YOUR NATURAL CHOICE</span></div>
		
</footer>
</body>
</html>
