<?php 
require('session.php');
require('connection.php');

if(isset($_POST['RemoveID']) && isset($_POST['RemoveTable'])){
    $PK = $_POST['RemoveID'];
    $tablename = $_POST['RemoveTable'];

    if($tablename == "Exhibition"){
        $query = "Delete from $tablename where E_ID = '$PK'";
        if(mysqli_query($connection,$query)){
            $_SESSION['success'] = "SUCCESS. DELETED FROM $tablename";
    
            header("Location:Admin.php");
            return;
          }
         else{
            $_SESSION['error'] = "ERROR! COULD NOT REMOVE.";
    
            header("Location:Admin.php");
            return;
        }
    }
    else if($tablename == "Artist"){
        $query = "Delete from $tablename where Artist_ID = '$PK'";
        if(mysqli_query($connection,$query)){
            $_SESSION['success'] = "SUCCESS. DELETED FROM $tablename";
    
            header("Location:Admin.php");
            return;
          }
         else{
            $_SESSION['error'] = "ERROR! COULD NOT REMOVE.";
    
            header("Location:Admin.php");
            return;
            }
    }
    else if($tablename == "Artwork"){
        $query = "Delete from $tablename where Art_ID = '$PK'";
        if(mysqli_query($connection,$query)){
            $_SESSION['success'] = "SUCCESS. DELETED FROM $tablename";
    
            header("Location:Admin.php");
            return;
          }
         else{
           
            $_SESSION['error'] = "ERROR! COULD NOT REMOVE.";
    
            header("Location:Admin.php");
            return;
            }
    }
    else{
       
        $_SESSION['error'] = "ERROR! PLEASE SELECT A TABLE.";
    
        header("Location:Admin.php");
        return;
    }

    
    }
?>