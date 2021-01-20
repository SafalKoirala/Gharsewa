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
    echo "<script>alert('BOOKING CANCELLED')</script>";
    echo "<script>window.location.href ='user-page.php'</script>";
    
     
 }
?>