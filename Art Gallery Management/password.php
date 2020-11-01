<?php
require('session.php');
require('connection.php');

if(isset($_POST['OldPwd']) && isset($_POST['NewPwd'])){
    $ID = $_SESSION['user'];
    $Old = $_POST['OldPwd'];
    $New = $_POST['NewPwd'];

    $check = "Select Password from admin where admin_id = '$ID'";

    $value = mysqli_query($connection,$check);

    if($value != "FALSE" ){
        $row = mysqli_fetch_assoc($value);

        if($Old != $row["Password"]){
            $_SESSION['error'] = "ERROR! OLD PASSWORD INCORRECT.";
    
            header("Location:Admin.php");
            return;
        }
        else if($Old == $New){
            $_SESSION['error'] = "ERROR! OLD PASSWORD SAME AS NEW.";
    
            header("Location:Admin.php");
            return;
        }
        else{
            $update = "Update Admin set Password = '$New' where Admin_ID = '$ID'";
            if(mysqli_query($connection,$update)){
                $_SESSION['success'] = "PASSWORD UPDATED.";
    
            header("Location:Login.php");
            return;
            }
            else{
                $_SESSION['error'] = "ERROR! PASSWORD NOT UPDATED.";
    
            header("Location:Admin.php");
            return;
            }
        } 
    }

}

?>