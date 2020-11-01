<?php 
require('connection.php');
$imageName = array();
$ArtistF = array();
$ArtistL = array();
$Email = array();
$Contact = array();
$ID = array();
$i=0;
$query = "Select * from Artist";

$result = mysqli_query($connection,$query);

if( mysqli_num_rows($result) > 0){
    $rows = mysqli_num_rows($result);    
    while($value = mysqli_fetch_assoc($result)){
        $imageName[] = $value['ImageName'];
         $ArtistF[] = $value['F_Name'];
         $ArtistL[] = $value['L_Name'];
         $Email[] = $value['Email'];
         $Contact[] = $value['PhNo'];
         $ID[] = $value['Artist_ID']; 
    }   
}
else {
    echo "<script>alert('ERROR!')</script>";
}
?>

<html>
<head>
<title> ARTIST </title>
<link rel="stylesheet" type="text/CSS" href="CSS/homeStylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    
     <div class="topnav" id="myTopnav">
        <a href="Art_Home.php">
        <img src = "static/euphoria.png" style ="height : 30px" > 
        </a>
        <a href="Exhibitions.php" >E X H I B I T I O N S</a>
        <a href="Artists.php" class="active">A R T I S T S</a>
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
        <form method="POST" action="artwork.php">
        <div class="row">
          
        <div class="col-sm-8">
        <h3>  <?=$ArtistF[$i]?> <?=$ArtistL[$i]?> </h3> 
        <h4>
            Contact : 
            <?=$Contact[$i] ?>
            |
            <?=$Email[$i] ?> 
            
        </h4>
           
        </div>
        <div class="col-sm-4" style="align-items :center;">
        <button type="Submit" id = "<?=$ID[$i];?>" name="<?=$ID[$i];?>"> <img src="static/<?=$imageName[$i]?>" height=35% width=100%> </button>
        </div>
        </div>
        </form>
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