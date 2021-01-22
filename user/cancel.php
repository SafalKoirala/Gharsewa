<?php session_start();?>
<?php require_once("../inc/dbconn.php")?>
<?php

//bookings flags being set to cancelled in db

  if($_SERVER['REQUEST_METHOD']=='POST'){
     
    $id = $_POST['id'];  

    $flag=1;
    $bookings =3;
    $query = "UPDATE book SET  bookings=:bookings,flag=:flag  WHERE id=:id";
    $stmt = $pdo -> prepare($query);
    $stmt->bindParam(':bookings',$bookings);
    $stmt->bindParam(':flag',$flag);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
   
   
    //cancel ko email
    $staff_id =$_POST['staff_id']; 
    $id = (int)$staff_id;
    $query ="SELECT email FROM staff WHERE id =:id";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $email = $stmt->fetch();
    
     $to_email = $email["email"];
     $subject = " Booking Cancelled";
     $body = "Hi, An user has cancelled the current bookings";
     $headers = "From: safalkoirala92@gmail.com";
    
    if (mail($to_email, $subject, $body, $headers)) {
          echo "<script>alert('BOOKINGS CANCELLED')</script>";
        echo "<script>window.location.href ='user-page.php'</script>";
    }
    
 }
?>