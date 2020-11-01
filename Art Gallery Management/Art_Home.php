<?php
require('connection.php');
$imageName = array();
$ExName = array();
$ExStart = array();
$ExEnd = array();
$Artist = array();
$i=1;
$query = "Select distinct exhibition.ImageName,exhibition.E_Name,exhibition.E_StartDate,exhibition.E_EndDate,Artist.F_Name,Artist.L_Name from exhibition,artist where artist.artist_id = exhibition.artist_id order by E_StartDate desc limit 3";

$result = mysqli_query($connection,$query);

if(mysqli_num_rows($result) > 0){
  $rows = mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $imageName[] = $row['ImageName'];
    $ExName[] = $row['E_Name'];
    $ExStart[] = $row['E_StartDate'];
    $ExEnd[] = $row['E_EndDate'];
    $artistName = $row['F_Name'];
    $artistName .= " ";
    $artistName .= $row['L_Name'];
    $Artist[] = $artistName;
   }
}

else{
  echo "<script>alert('ERROR!')</script>";
}

?>
<html>
<head>
<title> EUPHORIA </title>
<link rel="stylesheet" type="text/CSS" href="CSS/homeStylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

     <div class="topnav" id="myTopnav">
        <a href="Art_Home.php">
        <img src = "static/euphoria.png" style ="height : 30px" > 
        </a>
        <a href="Exhibitions.php">E X H I B I T I O N S</a>
        <a href="Artists.php">A R T I S T S</a>
        <!-- <div style="float : right; ">
            <a href="Login.html">A D M I N</a>
        </div> -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>

      <div id="myCarousel" class="carousel slide" data-ride="carousel">      
        <!-- Wrapper for slides -->
        
        <div class="carousel-inner">
          
          <div class="item active">
            <img src="static/<?=$imageName[0]?>" alt="static/img3.jpg" style ="width : 100%; opacity: 0.75; filter: brightness(50%);">
            <div class="carousel-caption">
              <h3><?=$ExName[0]?></h3>
              <h4><?=$ExStart[0]?> - <?=$ExEnd[0] ?></h4>
              <p>
                AN EXHIBITION BY : <?=$Artist[0]?> 
              </p>
            </div>
          </div>
          <?php while($i <$rows){?>
          <div class="item">
            <img src="static/<?=$imageName[$i]?>" alt="static/img1.jpg" style ="width : 100%; opacity: 0.75; filter: brightness(50%);">
            <div class="carousel-caption">
            <h3><?=$ExName[$i]?></h3>
              <h4><?=$ExStart[$i]?> - <?=$ExEnd[$i] ?></h4>
              <p>
                AN EXHIBITION BY : <?=$Artist[$i]?> 
              </p>
            </div>
          </div>
          <?php $i=$i+1;}?>
          
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <div style="background-color: black; opacity: 0.75;">
        <img src = "static/euphoria.png" style ="height : 70px" > 
    </div>
    <br>
      <div class = container>
        <p style="text-align: center;">
            
            Euphoria Gallery is taking all the necessary precautions recommended by the Centers for Disease Control and other officials to ensure the ongoing safety of our staff and our visitors.
            <br>In order to combat the spread of COVID-19, Euphoria Gallery requires that all visitors entering the gallery adhere to the following safety precautions:
            <br>
            <br>
        </p>
        <ul >
            <li>Visitors must stand 6 feet apart from staff and other visitors at all times.</li>
            <li>Visitors must wear masks.</li>
            <li>Visitors must provide contact information when entering the gallery to aid in the City’s contact tracing efforts.</li>
            <li>Capacity in the gallery must not exceed 15 visitors at any time. Please wait outside for other guests to leave if capacity has been reached.</li>
        </ul>
        <br>
        <br>
        <p style="text-align: center;">
            You cannot enter the Gallery if any of the following conditions apply:
            <br>
        </p>
        <ul >
            <li>You are experiencing any symptoms associated with COVID-19 including cough, shortness of breath or difficulty breathing, fever, chills, muscle pain or weakness, sore throat, or loss of taste or smell.</li>
            <li>You have in the last 14 days had any close contact with anyone who is either confirmed or suspected of being infected with COVID-19, including anyone who was experiencing or displaying any of the known symptoms.</li>
            
        </ul>
        <br>
        <p style="text-align: center;">
            Thank you for your cooperation.
        </p>   
    </div> 
    
    <footer style="background-color: rgb(231, 229, 229);">
        <hr style="height:1px;border-width:0;color:black;background-color:black">  
        <div class="container">
        <div class=row style="text-align: center; font-size: medium;">
            <div class="col-md-4 mx-auto">
               <h4>EUPHORIA CHELSEA</h4> 
                531 WEST 24TH STREET, NEW YORK, NY 10011<br>
                TEL: 212.206.9100 FAX: 212.206.9055
                <br>
                VISITING HOURS: TUESDAY – SATURDAY, 11AM – 6PM
            </div>
            <div class="col-md-4 mx-auto">
                <h4>EUPHORIA BUSHWICK</h4>
                
                25 KNICKERBOCKER AVE, BROOKLYN, NY 11237<br>
                TEL: 718.386.2746 FAX: 718.386.2744
                <br>
                VISITING HOURS: TUESDAY – SATURDAY, 11AM – 6PM
            </div>
            <div class="col-md-4 mx-auto">
                <h4>EUPHORIA TRIBECA</h4>
                17 WHITE STREET, NEW YORK, NY 10013<br>
                TEL: 646.960.7540
                <br>
                VISITING HOURS: TUESDAY – SATURDAY, 11AM – 6PM
            </div>
        </div>
    </div>
    <div style="background-color: rgb(194, 191, 191);">
        <hr style="height:1px;border-width:0;color:black;background-color:black">  
        <h5>All rights reserved.</h5>
        <h6>
            Please contact us at 212.206.9100 or support@euphoriagalleries.com.
        </h6>
        <br>
    </div>            
</footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
