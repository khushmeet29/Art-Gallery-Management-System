<?php 
    session_start();
    require('connection.php');
    include_once('flashmessage.php');
    
    if (isset($_POST['userID']) and isset($_POST['PWD'])){
        
        // Assigning POST values to variables.
        $username = $_POST['userID'];
        $password = $_POST['PWD'];

        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `admin` WHERE Admin_ID ='$username' and Password='$password'";
        
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1) {

            //echo "Login Credentials verified";
            echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

            $_SESSION['user'] = $username;
            $_SESSION['success'] = "Login Credentials verified.";
            header("Location:Admin.php");
            return;
        }
        else {
            $_SESSION['error'] = "INVALID LOGIN CREDENTIALS.";
            header("Location:Login.php");
            return;
            
        }
    }
?>

<html>
    <head>
        <title>
            LOGIN
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/CSS" href="CSS/homeStylesheet.css">
    </head>
<body>
    <div class="topnav" id="myTopnav">
        <a href="#">
        <img src = "static/euphoria.png" style ="height : 30px" > 
        </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>

      </div>
      
    <div class="container">
        
        <form method="POST">
        <?php 
        flashMessage();
        ?>
        <br>
            <input type="text" name="userID" id="userID" placeholder="ID" required>
            <br>
            <br>
            <input type="password" name = "PWD" id="PWD" placeholder="PASSWORD" required>
            <br>
            <br>
            <div style="margin-left: 8%;">
            <br>
            <input type="submit" name="SUBMIT" class="btn btn-info btn-md" value="SUBMIT">
            <br>
          
            <br>
            
            </div>
        </form>
        
    </div>
      
     
    <div style="background-color: rgb(194, 191, 191); position: fixed;left: 0; bottom: 0; width: 100%;">
        <br>
        <h5>All rights reserved.</h5>
        <br>
        <h6>
            Please contact us at 212.206.9100 or support@euphoriagalleries.com
        </h6>
        <br>
    </div>            


</body>
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

</html>

