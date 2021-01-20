<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once("../inc/dbconn.php")?>


<?php

//updating the  bookings details in  db

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $date = $_POST['date'];  
    $time = $_POST['time'];  
    $problem = $_POST['problem'];  
    $id = $_POST['id']; 
    $query = "UPDATE  book  SET date=:date,time=:time,problem=:problem WHERE id=:id";
 
    $stmt=$pdo->prepare($query);
   
    $stmt->bindParam(':date',$date);
    $stmt->bindParam(':time',$time);
    $stmt->bindParam(':problem',$problem);
    $stmt->bindParam(':id',$id);
    $stmt->execute(); 
    
        echo "<script>alert('BOOKINGS UPDATED')</script>";
        echo "<script>window.location.href ='user-page.php'</script>";
    
   //email ko lagi
     
    
     
 }
?>
