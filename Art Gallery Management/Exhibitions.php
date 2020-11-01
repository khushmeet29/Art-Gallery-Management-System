<?php 
require('connection.php');
$imageName = array();
$ExName = array();
$ExStart = array();
$ExEnd = array();
$ArtistF = array();
$ArtistL = array();
$gallery = array();
$i=0;
$query = "Select exhibition.ImageName,exhibition.E_Name,exhibition.E_StartDate,exhibition.E_EndDate,Artist.F_Name,Artist.L_Name,gallery.G_Location from exhibition,artist,gallery where artist.artist_id = exhibition.artist_id and exhibition.g_id = gallery.g_id order by E_StartDate desc";

$result = mysqli_query($connection,$query);

if( mysqli_num_rows($result) > 0){
    $rows = mysqli_num_rows($result);    
    while($value = mysqli_fetch_assoc($result)){
        $imageName[] = $value['ImageName'];
         $ExName[] = $value['E_Name'];
         $ExStart[] = $value['E_StartDate'];
         $ExEnd[] = $value['E_EndDate'];
         $ArtistF[] = $value['F_Name'];
         $ArtistL[] = $value['L_Name'];
         $gallery[] = $value['G_Location'];
    }
}
  else {
    echo "<script>alert('ERROR!')</script>";
  }


?>

<html>
<head>
<title> EXHIBITION </title>
<link rel="stylesheet" type="text/CSS" href="CSS/homeStylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    
     <div class="topnav" id="myTopnav">
        <a href="Art_Home.php">
        <img src = "static/euphoria.png" style ="height : 30px" > 
        </a>
        <a href="Exhibitions.php" class="active">E X H I B I T I O N S</a>
        <a href="Artists.php">A R T I S T S</a>
        <!-- <div style="float : right; ">
            <a href="Login.html">A D M I N</a>
        </div> -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <div class="container"></div>
      <div class="Section" style="margin-top : 5%; margin-left : 5%; margin-right : 5%; background-color: rgb(231, 229, 229); font-family :'Courier New', Courier, monospace;">
      <?php while($i <= $rows-1){?>
      <div class="row">
        <div class="col-sm-8">
        <h2><?=$ExName[$i]?></h2>
        <h3> By : <?=$ArtistF[$i]?> <?=$ArtistL[$i]?>
         </h3>
        <p>
        <?=$ExStart[$i]?> - <?=$ExEnd[$i]?>    
        <br>
        <?=$gallery[$i] ?>
        </p>    
        </div>
        <div class="col-sm-4" style="align-items :center;">
            <img src="static/<?=$imageName[$i]?>" height=35% width=100%>
        </div>
        </div>
        <hr style="height:5px;color:gray;background-color:white">
      <?php $i = $i+1;} ?> 
      
    </div>
    <footer style="width:100%; bottom:0">
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