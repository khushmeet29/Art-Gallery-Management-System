<?php 

require('connection.php');

if (isset($_POST['ExINSERT'])){
    $ExID = $_POST['EID'];
    $ExName = $_POST['Ename'];
    $ExArtist = $_POST['EartistID'];
    $ExGallery = $_POST['EgalleryID'];
    $ExImg = $_POST['ExhibitionImg'];
    $ExStart = $_POST['Estart'];
    $ExEnd = $_POST['Eend'];
    
    $PKCheck = "Select E_ID from exhibition";
    $PKresult = mysqli_query($connection, $PKCheck);

    $ArtistCheck = "Select Artist_ID from artist";
    $Artistresult = mysqli_query($connection, $ArtistCheck);

    $GalleryCheck = "Select G_ID from gallery";
    $Galleryresult = mysqli_query($connection, $GalleryCheck);
    $flag=0;
    if (mysqli_num_rows($PKresult) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($PKresult)) {
          if($ExID == $row["E_ID"]){
            echo "<script type='text/javascript'>alert('ERROR! Exhibition ID already exists.')</script>";    
            $flag=1;
            
          }
          else{$flag=0; break;}
          
        }
    }

    if (mysqli_num_rows($Artistresult) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($Artistresult)) {
          if($ExArtist == $row['Artist_ID']){
              $flag=0;
            break;
            }
            else {
            // echo "<script type='text/javascript'>alert('ERROR! ARTIST ID DOES NOT EXIST.')</script>";  
            $flag=1;  
            }
        }
    }
    if (mysqli_num_rows($Galleryresult) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($Galleryresult)) {
          if($ExGallery != $row['G_ID']){
                $flag=1;
                // echo "<script type='text/javascript'>alert('ERROR!".$row['G_ID']." GALLERY ID DOES NOT EXIST ".$ExGallery."')</script>";    
            }
            else {$flag=0; break;}
        }
    }

    if($flag == 0)
    {
        $Insertquery = "Insert into Exhibition values ('$ExID','$ExGallery','$ExArtist','$ExName','$ExStart','$ExEnd','$ExImg')";
    
        //$result = mysqli_query($connection, $Insertquery);

        if(mysqli_query($connection, $Insertquery)){
            echo "<script type='text/javascript'>alert('ADDED EXHIBITION.')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('ERROR! PLEASE CHECK.')</script>";
        }
    }
} 

if (isset($_POST['ArtistINSERT'])){
    $ArtistID = $_POST['AID'];
    $ArtistFname = $_POST['Afname'];
    $ArtistLname = $_POST['Alname'];
    $ArtistEmail = $_POST['Aemail'];
    $ArtistImg = $_POST['AImageName'];
    $ArtistPhone = $_POST['APhoneNo'];
    $ArtistDOB = $_POST['ADOB'];
    
    $PKCheck = "Select Artist_ID from artist";
    $PKresult = mysqli_query($connection, $PKCheck);
    $flag=0;
    if (mysqli_num_rows($PKresult) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($PKresult)) {
          if($ArtistID == $row["Artist_ID"]){
            echo "<script type='text/javascript'>alert('ERROR! ARTIST already present.')</script>";    
            $flag=1;
          }
          else{$flag=0; break;}
        }
    }

    if($flag == 0)
    {
        $Insertquery = "Insert into artist values ('$ArtistID','$ArtistFname','$ArtistLname','$ArtistDOB','$ArtistPhone','$ArtistEmail','$ArtistImg')";

        if(mysqli_query($connection, $Insertquery)){
            echo "<script type='text/javascript'>alert('ADDED ARTIST.')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('ERROR! PLEASE CHECK.')</script>";
        }
    }
} 

if (isset($_POST['ArtINSERT'])){
    $ArtworkID = $_POST['ArtID'];
    $ArtworkTitle = $_POST['ArtTitle'];
    $ArtworkYear = $_POST['ArtYear'];
    $ArtworkDesc = $_POST['ArtDesc'];
    $ArtworkImg = $_POST['ArtImageName'];
    $ArtworkCreator = $_POST['Art_ArtistID'];
    
    $PKCheck = "Select Art_ID from artwork";
    $PKresult = mysqli_query($connection, $PKCheck);
    $flag=0;
    if (mysqli_num_rows($PKresult) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($PKresult)) {
          if($ArtworkID == $row["Art_ID"]){
            echo "<script type='text/javascript'>alert('ERROR! ARTWORK already exists.')</script>";    
            $flag=1;
          }
          else{$flag=0; break;}
          
        }
    }

    if($flag == 0)
    {
        $Insertquery = "Insert into artwork values ('$ArtworkID','$ArtworkCreator','$ArtworkTitle','$ArtworkYear','$ArtworkDesc','$ArtworkImg')";

        if(mysqli_query($connection, $Insertquery)){
            echo "<script type='text/javascript'>alert('ADDED ARTWORK.')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('ERROR! PLEASE CHECK.')</script>";
        }
    }
} 

?>
