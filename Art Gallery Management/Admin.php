<?php 
require('session.php');
require('connection.php');
require('insert.php');
//require('update.php');
//require('remove.php');
include_once('flashmessage.php');
?>


<html>
    <head>
        <title>
            ADMIN
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/CSS" href="CSS/homeStylesheet.css">
    </head>
<body>
    
<?php 
    flashMessage();
    ?>
    <div class="topnav" id="myTopnav">
        <a href="Admin.php">
        <img src = "static/euphoria.png" style ="height : 30px" > 
        </a>
        
        <div style="float : right; ">
            <a href="Admin.php" > <?=$_SESSION['user']; ?> </a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      
      <div class="sidenav">
        <button class="dropdown-btn" outline> Add Data
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="#" onclick="AddExhibition()">Exhibiton</a>
            <a href="#" onclick="AddArtists()">Artist</a>
            <a href="#" onclick="AddArtwork()">Artwork</a>
          </div>
          <br>
          <a href="#" onclick="Update()">Update</a>
          <a href="#" onclick="Remove()">Remove</a>  
        <a href="#" onclick="UpdatePwd()">Change Password</a>
        <a href="Logout.php">Log Out</a>
      </div>
    <div class="container">
    
    </div>
    <div class="InsertExhibition">
        <form method="POST" action="insert.php">
            <h2>
            <input type="text" name="EID" placeholder="ID" required>
            <br>
            <br>
            <input type="text" name = "Ename" placeholder="EXHIBITION NAME" required>
            <br>
            <br>
            <input type="text" name = "EartistID" placeholder="ARTIST ID" required>
            <br>
            <br>
            <input type="text" name = "EgalleryID" placeholder="GALLERY ID" required>
            <br>
            <br>
            <input type="text" name = "ExhibitionImg" placeholder="EXHIBITION IMAGE" required>
            <br>
            <br>                
            START DATE :
            <br>
            <input type="date" name = "Estart" required>
            
            <br>
            <br>
            END DATE :
            <br>
            <input type="date" name = "Eend" required>

            <br>
            <br>
            
            <input type="submit" name="ExINSERT" class="btn btn-info btn-md" value="INSERT">
            <br>
            <br>
            
        </h2>
        </form>
    </div>
    <div class="InsertArtists">
        <form method="POST" action="insert.php">
            <h2>
            <input type="text" name="AID" placeholder="ID" required>
            <br>
            <br>
            <input type="text" name = "Afname" placeholder="FIRST NAME" required>
            <br>
            <br>
            <input type="text" name = "Alname" placeholder="LAST NAME" required>
            <br>
            <br>
            <input type="email" name = "Aemail" placeholder="EMAIL" required>
            <br>
            <br>
            <input type="numeric" name = "APhoneNo" placeholder="PHONE NUMBER" min=0 required>
            <br>
            <br> 
            <input type="text" name = "AImageName" placeholder="IMAGE NAME" required>
            <br>
            <br>                               
            DOB :
            <br>
            <input type="date" name = "ADOB" required>
            <br>
            <br>
            
            <input type="submit" name="ArtistINSERT" class="btn btn-info btn-md" value="INSERT">
            <br>
            <br>
            
        </h2>
        </form>
    </div>
    <div class="InsertArtwork" action="insert.php">
        <form method="POST">
            <h2>
            <input type="text" name="ArtID" placeholder="ID" required>
            <br>
            <br>
            <input type="text" name = "ArtTitle" placeholder="Title" required>
            <br>
            <br>
            <input type="number" name = "ArtYear" placeholder="Year" required>
            <br>
            <br>
            <input type="text" name = "Art_ArtistID" placeholder="ARTIST ID" required>
            <br>
            <br>
            <input type="text" name = "ArtDesc" placeholder="Description" required>
            <br>
            <br>                
            <input type="text" name = "ArtImageName" placeholder="IMAGE NAME" required>
            <br>
            <br>                
            <input type="submit" name="ArtINSERT" class="btn btn-info btn-md" value="INSERT">
            <br>
            <br>
            
        </h2>
        </form>
    </div>

    <div class="Update">
            <h2>
            <select name="Table" id="Table">
                <option value="" disabled selected>SELECT WHAT TO UPDATE </option>
                <option value="Exhibition"> Exhibition</option>
                <option value="Artist"> Artist</option>
                <option value="Artwork"> Artwork</option>
            </select>
            <button id="Table" class="btn btn-info btn-md" onclick="UpdateDropDown()">
                SUBMIT
            </button>
            </h2>
            <br>
            <form method="POST" action="update.php" >
            <h2>    
            <select name="ExhibitionCols" id="ExField" style="display:none;">
                <option value="" disabled selected>SELECT THE FIELD </option>
                <option name="ExName" value="E_Name"> Exhibition Name</option>
                <option name="ExStart" value="E_Start"> Exhibition Start Date</option>
                <option name="ExEnd" value="E_EndDate"> Exhibition Start Date</option>
                <option name="ExGallery" value="G_ID"> Gallery of Exhibition </option>
                <option name="ExArtist" value="Artist_ID"> Artist </option>
                <option name="ExImage" value="ImageName"> Image Name </option>
            </select>            
            <select name="ArtistCols" id="ArtistField" style="display:none;"> 
                <option value="" disabled selected>SELECT THE FIELD </option>
                <option name="ArtistNameF" value="F_Name"> Artist First Name</option>
                <option name="ArtistNameL" value="L_Name"> Artist Last Name</option>
                <option name="ArtistDOB" value="DOB"> DOB Of Artist</option>
                <option name="ArtistPhNo" value="PhNo"> Phone Number </option>
                <option name="ArtistEmail" value="Email"> Email </option>
                <option name="ArtistImage" value="ImageName"> Image Name </option>
            </select>
            <select name="ArtworkCols" id="ArtField" style="display:none;">
                <option value="" disabled selected>SELECT THE FIELD </option>
                <option name="ArtworkTitle" value="Title"> Title</option>
                <option name="ArtworkYear" value="Year"> Year</option>
                <option name="Creator" value="Artist_ID"> Artist</option>
                <option name="ArtworkDesc" value="Description"> Description </option>
                <option name="ArtworkImage" value="ImageName"> Image Name </option>
            </select>            
            <br>
            <br>
            <input type="text" name="ID" id="ID" placeholder="ID" required>
            <br>
            <br>
            <input type="text" name = "NewInfo" placeholder="NEW INFO" required>
            <br>
            <br>
            <input type="submit" name="UPDATE" class="btn btn-info btn-md" value="UPDATE">
            <br>
            <br>
            
        </h2>
        </form>
    </div>
    <div class="Remove">
        <form method="POST" action="remove.php" >
            <h2>
            <select name="RemoveTable" id="RemoveTable">
                <option value="" disabled selected>SELECT WHAT TO DELETE </option>
                <option value="Exhibition"> Exhibition</option>
                <option value="Artist"> Artist</option>
                <option value="Artwork"> Artwork</option>
            </select>
            <br>
            <br>
            <input type="text" name="RemoveID" placeholder="ID" required>
            <br>
            <br>
            <input type="submit" name="DELETE" class="btn btn-info btn-md" value="DELETE">
            <br>
            <br>
            
        </h2>
        </form>
    </div>

    <div class="UpdatePwd">
        
            <form method="POST" action="password.php">
                <h2>
            <input type="text" name = "OldPwd" placeholder="OLD PASSWORD" required>
            <br>
            <br>

            <input type="text" name = "NewPwd" placeholder="NEW PASSWORD" required>
            <br>
            <br>
            <input type="submit" name="UPDATE" class="btn btn-info btn-md" value="UPDATE">
            <br>
            <br>
            
        </h2>
        </form>
    </div>



    <div style="background-color: rgb(194, 191, 191); position: fixed; bottom: 0; width: 100%; margin-left: 14%; text-align: center;">
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
    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

<script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function AddExhibition(){
    var popupForm = document.querySelector('.InsertExhibition');
    popupForm.style.display = 'block';
    var hide2  = document.querySelector('.InsertArtists');
    hide2.style.display = 'none';
    var hide3  = document.querySelector('.InsertArtwork');
    hide3.style.display = 'none';
    var hide4 = document.querySelector('.Update');
    hide4.style.display = 'none';
    var hide5 = document.querySelector('.Remove');
    hide5.style.display = 'none';
    var hide7 = document.querySelector('.UpdatePwd');
    hide7.style.display = 'none';
}
function AddArtists(){
    var popupForm = document.querySelector('.InsertArtists');
    popupForm.style.display = 'block';

    var hide1  = document.querySelector('.InsertExhibition');
    hide1.style.display = 'none';
    var hide3  = document.querySelector('.InsertArtwork');
    hide3.style.display = 'none';
    var hide4 = document.querySelector('.Update');
    hide4.style.display = 'none';
    var hide5 = document.querySelector('.Remove');
    hide5.style.display = 'none';
    var hide7 = document.querySelector('.UpdatePwd');
    hide7.style.display = 'none';
}

function AddArtwork(){
    var popupForm = document.querySelector('.InsertArtwork');
    popupForm.style.display = 'block';

    var hide1  = document.querySelector('.InsertExhibition');
    hide1.style.display = 'none';
    var hide2  = document.querySelector('.InsertArtists');
    hide2.style.display = 'none';
    var hide4 = document.querySelector('.Update');
    hide4.style.display = 'none';
    var hide5 = document.querySelector('.Remove');
    hide5.style.display = 'none';
    var hide7 = document.querySelector('.UpdatePwd');
    hide7.style.display = 'none';
}


function Update(){
    var popupForm = document.querySelector('.Update');
    popupForm.style.display = 'block';

    var hide1  = document.querySelector('.InsertExhibition');
    hide1.style.display = 'none';
    var hide2  = document.querySelector('.InsertArtists');
    hide2.style.display = 'none';
    var hide3  = document.querySelector('.InsertArtwork');
    hide3.style.display = 'none';
    var hide5 = document.querySelector('.Remove');
    hide5.style.display = 'none';
    var hide7 = document.querySelector('.UpdatePwd');
    hide7.style.display = 'none';
    
}
function Remove(){
    var popupForm = document.querySelector('.Remove');
    popupForm.style.display = 'block';

    var hide1  = document.querySelector('.InsertExhibition');
    hide1.style.display = 'none';
    var hide2  = document.querySelector('.InsertArtists');
    hide2.style.display = 'none';
    var hide3  = document.querySelector('.InsertArtwork');
    hide3.style.display = 'none';
    var hide4 = document.querySelector('.Update');
    hide4.style.display = 'none';
    var hide7 = document.querySelector('.UpdatePwd');
    hide7.style.display = 'none';
    
}

function UpdatePwd(){

    var popupForm = document.querySelector('.UpdatePwd');
    popupForm.style.display = 'block';

    var hide1  = document.querySelector('.InsertExhibition');
    hide1.style.display = 'none';
    var hide2  = document.querySelector('.InsertArtists');
    hide2.style.display = 'none';
    var hide3  = document.querySelector('.InsertArtwork');
    hide3.style.display = 'none';
    var hide4 = document.querySelector('.Update');
    hide4.style.display = 'none';
    var hide5 = document.querySelector('.Remove');
    hide5.style.display = 'none';
}

function UpdateDropDown(){
    var SelectElem = document.querySelector('#Table');
    var tablename = SelectElem.value;

    if(tablename == "Exhibition"){
        var x = document.getElementById('ID');
        x.placeholder = "Exhibition ID";
        var popup = document.querySelector('#ExField');
        popup.style.display = 'inline';
        var hide1 = document.querySelector('#ArtistField');
        hide1.style.display = 'none';
        var hide2 = document.querySelector('#ArtField');
        hide2.style.display = 'none';
    }
    else if(tablename == "Artist"){
        var x = document.getElementById('ID');
        x.placeholder = "Artist ID";
        var popup = document.querySelector('#ArtistField');
        popup.style.display = 'inline';
        var hide1 = document.querySelector('#ExField');
        hide1.style.display = 'none';
        var hide2 = document.querySelector('#ArtField');
        hide2.style.display = 'none';
    }
    else{
        var x = document.getElementById('ID');
        x.placeholder = "Artwork ID";
        var popup = document.querySelector('#ArtField');
        popup.style.display = 'inline';
        var hide1 = document.querySelector('#ArtistField');
        hide1.style.display = 'none';
        var hide2 = document.querySelector('#ExField');
        hide2.style.display = 'none';
    }
}

</script>

<script>
$("button").on("click", function() {
  $("button").removeClass("active");
  $("a").removeClass("active");
  $(this).addClass("active");
});

$("a").on("click", function() {
  $("a").removeClass("active");
  $("button").removeClass("active");
  $(this).addClass("active");
});
</script>

</html>

