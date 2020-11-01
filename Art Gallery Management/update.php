<?php 
require('session.php');
require('connection.php');

if(isset($_POST['ExhibitionCols'])){
    $tablename = "Exhibition";
    $PK = $_POST['ID'];
    $Info = $_POST['NewInfo'];
    $ColName = $_POST['ExhibitionCols'];
    $update = "Update Exhibition set $ColName = '$Info' where E_ID = '$PK'";
    if(mysqli_query($connection,$update)){
        echo "<script type='text/javascript'>alert('UPDATED ".$tablename."')</script>";
        
        $_SESSION['success'] = "UPDATED $tablename.";
        
        header("Location:Admin.php");
		return;
    }
     else{
        $_SESSION['error'] = "ERROR IN UPDATING. PLEASE CHECK.";
        
        header("Location:Admin.php");
		return;
        }
    
}
else if(isset($_POST['ArtistCols'])){
    $tablename = "Artist";
    $PK = $_POST['ID'];
    $Info = $_POST['NewInfo'];
    $ColName = $_POST['ArtistCols'];
    $update = "Update Artist set $ColName = '$Info' where Artist_ID = '$PK'";
    if(mysqli_query($connection,$update)){
        $_SESSION['success'] = "UPDATED $tablename.";
        
        header("Location:Admin.php");
		return;
      }
     else{
        $_SESSION['error'] = "ERROR IN UPDATING. PLEASE CHECK.";
        
        header("Location:Admin.php");
		return;
        }
    
}
else if(isset($_POST['ArtworkCols'])){
    $tablename = "Artwork";
    $PK = $_POST['ID'];
    $Info = $_POST['NewInfo'];
    $ColName = $_POST['ArtworkCols'];
    $update = "Update Artwork set $ColName = '$Info' where Art_ID = '$PK'";
    if(mysqli_query($connection,$update)){
        $_SESSION['success'] = "UPDATED $tablename.";
        
        header("Location:Admin.php");
		return;
      }
     else{
        $_SESSION['error'] = "ERROR IN UPDATING. PLEASE CHECK.";
        
        header("Location:Admin.php");
		return;
        }
    
}

?>