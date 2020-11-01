<?php
   $connection =  mysqli_connect('localhost','root','','art_gallery');

   if($connection == false) {
       echo "Connection is not established";
   }
?>