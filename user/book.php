<?php session_start();?>
<?php require_once("../inc/dbconn.php")?>
<?php

//bookings flags being set in the db

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $date = $_POST['date'];  
    $time = $_POST['time'];  
    $problem = $_POST['problem'];  
    $staff_id = $_POST['staff_id'];  
    $user_id=(int)$_SESSION['user_id'];
    $requests =1;
    $bookings =2;
    $query = "INSERT INTO book (user_id, staff_id, date, time,problem,requests,bookings) VALUES (:user_id, :staff_id, :date, :time, :problem, :requests,:bookings)";
 
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->bindParam(':staff_id',$staff_id);
    $stmt->bindParam(':date',$date);
    $stmt->bindParam(':time',$time);
    $stmt->bindParam(':problem',$problem);
    $stmt->bindParam(':requests',$requests);
    $stmt->bindParam(':bookings',$bookings);
    $stmt->execute();  


//email ko lagi



    echo "<script>alert('BOOKINGS MADE')</script>";
    echo "<script>window.location.href ='user-page.php'</script>";
    
     
 }
?>
