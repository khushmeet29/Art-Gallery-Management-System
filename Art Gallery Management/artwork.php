<?php 
require('connection.php');
$ID = array();
$FName = array();
$LName = array();
$query = "Select Artist_ID,F_Name,L_Name from Artist";
$i=0;
$j=0;
$artist="";
$result = mysqli_query($connection,$query);

if( mysqli_num_rows($result) > 0){
    $rows = mysqli_num_rows($result);
    while($value = mysqli_fetch_assoc($result)){
         $ID[] = $value['Artist_ID']; 
         $FName[] = $value['F_Name']; 
         $LName[] = $value['L_Name']; 
    }   
}

while($i<$rows){
    if(isset($_POST[$ID[$i]])){
        $artist = $ID[$i];
        $Name = $FName[$i];
        $Name .= " ";
        $Name .= $LName[$i];
    break;
    }
    $i = $i + 1;
}
  
    $Title = array();
    $Desc = array();
    $Year = array();
    $art = array();

    $query1 = "Select Title,Year,Description,ImageName from artwork where artist_id = '$artist' order by Year desc";
    $paintings = mysqli_query($connection,$query1);
    $NumofArt = mysqli_num_rows($paintings);

if( mysqli_num_rows($paintings) > 0){
    
    while($val = mysqli_fetch_assoc($paintings)){
         $Title[] = $val['Title']; 
         $Desc[] = $val['Description'];
         $Year[] = $val['Year'];
         $art[] = $val['ImageName'];
     }   
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
         <div style="float : right; ">
            <a href="#" class="active"><?=$Name?></a>
        </div>  
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>

<div class="container"></div>
<div class="Section" style="margin-top : 5%; margin-left : 5%; margin-right : 5%; background-color: rgb(231, 229, 229); font-family :'Courier New', Courier, monospace;">
<?php while($j < $NumofArt){?>
<div class="row justify-content-md-center">
    <div class="col col-lg-6">
    <img src="static/<?=$art[$j]?>" height=85% width=100%>
      
    </div>
    <div class="col col-lg-6">
    <h3><?=$Title[$j]?></h3>
      <h4>
              <?=$Desc[$j]?>
              <br>
              <br>
              <?=$Year[$j]?>
      </h4>
    </div>
</div>
<hr style="height:5px;color:gray;background-color:white">
<?php $j = $j+1;} ?> 
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
