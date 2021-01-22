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
    $staff_id = $_POST['staff_id']; 
    $query = "UPDATE  book  SET date=:date,time=:time,problem=:problem WHERE id=:id";
 
    $stmt=$pdo->prepare($query);
   
    $stmt->bindParam(':date',$date);
    $stmt->bindParam(':time',$time);
    $stmt->bindParam(':problem',$problem);
    $stmt->bindParam(':id',$id);
    $stmt->execute(); 
    
       
    
   //email ko lagi
   $id = (int)$staff_id;
   $query ="SELECT email FROM staff WHERE id =:id";
   $stmt=$pdo->prepare($query);
   $stmt->bindParam(':id',$id);
   $stmt->execute();
   $email = $stmt->fetch();
   
    $to_email = $email["email"];
    $subject = "Booking Updated";
    $body = "Hi, Looks like an user has updated the date and time  please login in to your GharSewa account to deal with this request";
    $headers = "From: safalkoirala92@gmail.com";
   
   if (mail($to_email, $subject, $body, $headers)) {
         echo "<script>alert('BOOKINGS UPDATED')</script>";
       echo "<script>window.location.href ='user-page.php'</script>";
    
     
 }
}
?>
