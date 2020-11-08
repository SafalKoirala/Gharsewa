<?php 
    $host ="localhost";
    $db="gharsewa";
    $user="root";
    $pass="";
   $conn= mysqli_connect($host,$user,$pass,$db);

   if(!$conn){
    die("Connection failed because ".mysqli_connect_error());
      
   }
  ?>