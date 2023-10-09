<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/konva@8.4.2/konva.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet" />
    <title>WSN Graph Visualizer</title>
    <style>
    #my-canvas { border: 1px solid gray; }
   .context-font{
    color: black;
   }
   .right{
      position:absolute;
      left:800px;
      top:80px;
      text-align:justify ;
      width:500px;
      height:430px;
   }
   .h1{
background-color: yellow;
width:fit-content;
padding: 3px;
}
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("img_girl.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  
</style>
</head>
<body>
<div class="bg">
<h1> <center>Graph Visualizer</center></h1>
<nav >
  <div class="dropdown">
  
    <button onclick="myFunction()" class="dropbtn">Databases</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="wsngraph2.php" target="_self">cfm_sensors_configuration_01</a>
      <a href="wsngraph3.php" target="_self">cfm_sensors_configuration_03</a>
      <a href="config4.php" target="_self">cfm_sensors_configuration_04</a>
      <a href="config5.php" target="_self">cfm_sensors_configuration_05</a>
      <a href="nagpur2.php" target="_self">cfm_sensors_configuration_ceat_nagpur</a>
      <a href="wsngraph1.php" target="_self">wireless_sensors_network</a>
  
    </div>
 
  </div>
</nav>
  <script>
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  
  </script>
 
  <canvas id="my-canvas" width="1000" height="1000"></canvas>
  <div>
    <h2>Data</h2>
    <table border="2"  cellborder="2" style="width:600px; ">
      <tr>
        <th>ID</th><th>DEVICE TYPE</th><th>MAC ADDRESS</th><th>REGTIME</th><th>NAME</th><th>LOCATION</th><th>CONFIG TIME</th><th>UPDATE TIME</th>
      
      </tr>
<?php

$con = mysqli_connect("localhost:3306","user","Aditi@6112","wsn_proj");
//echo"connected successfully!<br><hr><br>";
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}

//$sql = "SELECT * FROM wireless_sensors_network";

$query=mysqli_query($con ,"SELECT * FROM cfm_sensors_configuration_ceat_nagpur ");
while($row=mysqli_fetch_assoc($query)){
//print_r($row);
print"<tr> <td>";
echo $row["id"];
print"</td> <td>";
echo $row["devicetype"];
print"</td> <td>";
echo $row["macaddress"];
print"</td> <td>";
echo $row["regtime"];
print"</td> <td>";
echo $row["name"];
print"</td> <td>";
echo $row["location"];
print"</td> <td>";
echo $row["configtime"];
print"</td> <td>";
echo $row["updatetime"];

}
?>
</div >
  <?php 
  
  echo"
 <script>

    var canvas = document.querySelector('#my-canvas');
    var context = canvas.getContext('2d');

    context.font = '12px Arial white';
   
    context.fillText('Sensor node', 890, 180);
    context.fillText('Repeater node', 890, 220);
    context.fillText('Cordinator node', 890, 260);
  

    context.beginPath();
    context.rect(820, 160, 50, 30);
    context.fillStyle = 'yellow';
    context.fill();
    //context.stroke();

    context.beginPath();
    context.rect(820, 200, 50, 30);
    context.fillStyle = 'pink';
    context.fill();
    //context.stroke();

    context.beginPath();
    context.rect(820, 240, 50, 30);
    context.fillStyle = 'blue';
    context.fill();

    //-------------------ARROW-------------------------------------------------

var canvas = document.querySelector('#my-canvas');
var context = canvas.getContext('2d');
context.beginPath();

function canvas_arrow(context, fromx, fromy, tox, toy) {
  var headlen = 15; // length of head in pixels
  var dx = tox - fromx;
  var dy = toy - fromy;
  var angle = Math.atan2(dy, dx);
  context.moveTo(fromx, fromy);
  context.lineTo(tox, toy);
  context.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
  context.moveTo(tox, toy);
  context.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
}           
canvas_arrow(context, 65, 730, 160, 780);
canvas_arrow(context, 68, 810, 130, 810);
canvas_arrow(context, 60, 870, 145, 835);
canvas_arrow(context, 195, 575, 270, 625);
canvas_arrow(context, 200, 650, 270, 650);
canvas_arrow(context, 295, 670, 179, 790);
canvas_arrow(context, 400, 620,328, 640 );
canvas_arrow(context, 375, 549, 415, 595);
canvas_arrow(context, 450, 510,390, 520);
canvas_arrow(context, 420, 448,380, 500);
canvas_arrow(context, 320, 420,403, 420);
canvas_arrow(context, 280, 505,289, 450);
canvas_arrow(context, 260, 340, 280, 393);
canvas_arrow(context, 320, 245, 270, 280);
canvas_arrow(context, 440, 160, 365, 208);
canvas_arrow(context, 240, 210, 260, 280);
canvas_arrow(context, 160, 340, 227, 310);
canvas_arrow(context, 140, 240, 230, 304);
canvas_arrow(context, 40, 180, 40, 245);
canvas_arrow(context, 60, 280, 130, 327);
canvas_arrow(context, 60, 380, 132, 359);
canvas_arrow(context, 140, 440, 145, 369);
canvas_arrow(context,300, 790 , 192, 810);
canvas_arrow(context,270, 900 , 290, 820);
canvas_arrow(context,410, 860 , 320, 815);
canvas_arrow(context,410, 720 , 330, 780);
canvas_arrow(context,540, 740 , 443, 720);
canvas_arrow(context,530, 630, 435, 700);
canvas_arrow(context,670, 740,572, 740);
canvas_arrow(context,620, 630, 660, 710);
canvas_arrow(context,700, 520, 630, 600);
canvas_arrow(context,550, 840, 442, 860);
canvas_arrow(context,680, 900, 575, 860);
canvas_arrow(context,780, 800, 690, 870);

canvas_arrow(context,580, 150,510, 221);
canvas_arrow(context,500, 250, 560, 325);
canvas_arrow(context,685, 250, 595, 320);
canvas_arrow(context,570, 480, 570, 382);
canvas_arrow(context, 590, 380, 590, 450);
context.stroke();

function fillCircle(x, y, color) {

context.fillStyle = color;

context.beginPath();
context.arc(x, y,32, 0, 2 * Math.PI);//x=width,y=height

context.fill();
//context.stroke();
}

fillCircle(580, 150,  'yellow');//110
fillCircle(500, 250,  'pink');//143
fillCircle(580, 350,  'pink');//132
fillCircle(580, 480,  'pink');//126
fillCircle(680, 250,  'yellow');//112
fillCircle(50, 700,  'yellow');//111
fillCircle(40, 800,  'yellow');//114
fillCircle(50, 900,  'pink');//147
fillCircle(300, 640,  'pink');//141
fillCircle(170, 560,  'yellow');//113
fillCircle(170, 650,  'yellow');//117
fillCircle(430, 620,  'pink');//142
fillCircle(360, 520,  'pink');//128
fillCircle(480, 510,  'yellow');//107
fillCircle(435, 420,  'pink');//125
fillCircle(289, 420,  'pink');//122
fillCircle(280, 535,  'yellow');//119
fillCircle(260, 310,  'pink');//123
fillCircle(340, 220,  'pink');//144
fillCircle(470, 150,  'yellow');//106
fillCircle(240, 180,  'yellow');//121
fillCircle(140, 240,  'pink');//137
fillCircle(160, 340,  'pink');//127
fillCircle(140, 440,  'yellow');//105
fillCircle(50, 380,  'yellow');//116
fillCircle(40, 280,  'pink');//131
fillCircle(40, 180,  'yellow');//109
fillCircle(300, 790,  'pink');//138
fillCircle(270, 900,  'yellow');//104
fillCircle(410, 720,  'pink');//129
fillCircle(410, 860,  'pink');//136
fillCircle(530, 630,  'yellow');//120
fillCircle(540, 740,  'pink');//124
fillCircle(620, 630,  'pink');//140
fillCircle(670, 740,  'pink');//133
fillCircle(700, 520,  'yellow');//115

fillCircle(550, 840,  'pink');//130
fillCircle(680, 900,  'pink');//139
fillCircle(780, 800,  'yellow');//118


fillCircle(160, 810,  'blue');//145
//------------------------------NUMBERING CIRCLE-----------------------------------
function fillText(num,x,y) {
    context.beginPath();
    context.textAlign = 'center';
    context.stroke();

}
context.fillText('110',570, 150);
context.fillText('114',30, 800);

context.fillText('147',40, 900);
context.fillText('143',490, 250);
context.fillText('132',570, 350);
context.fillText('112',670, 250);
context.fillText('126',570, 480);
context.fillText('117',160, 650);
context.fillText('113',160, 560,);

context.fillText('130',540, 840,);
context.fillText('118',770, 800,);
context.fillText('139',670, 900,);
context.fillText('115',690,520);
context.fillText('140',612, 630);
context.fillText('133', 664, 740);
context.fillText('111', 40, 700);
context.fillText('141',295, 640);
context.fillText('142', 420, 620);
context.fillText('128', 350, 520);
context.fillText('107', 475, 510);
context.fillText('125', 430, 420);
context.fillText('122', 280, 420);
context.fillText('119', 270, 535,);
context.fillText('123', 250, 310);
context.fillText('144',330, 220);
context.fillText('106', 460, 150);
context.fillText('121', 230, 180);
context.fillText('137', 130, 240);
context.fillText('127', 150, 340);
context.fillText('105', 130, 440);
context.fillText('116',40, 380);
context.fillText('131',40, 280);
context.fillText('109',30, 180);
context.fillText('104',260, 900);
context.fillText('138',290, 790);
context.fillText('129',400, 720);
context.fillText('120',525, 630);
context.fillText('124',535, 740);
context.fillText('136',400, 860);

context.stroke();
</script>";
?>
</body>
</html>
