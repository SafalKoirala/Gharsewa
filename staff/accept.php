<?php session_start();?>
<?php require_once"../inc/dbconn.php"?>
<?php
//bookings 1 means accepted 0 means rejected  , default =2 means neither accepted nor rejected , and 3 means cancelled
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user_id =$_POST['user_id'] ;
     $bookings =1 ;
    $flag =1;
    $staff_id=(int)$_SESSION['staff_id'];
    $query = "UPDATE book SET  bookings=:bookings,flag=:flag  WHERE staff_id=:staff_id && user_id=:user_id";
    $stmt = $pdo -> prepare($query);
    $stmt->bindParam(':bookings',$bookings);
    $stmt->bindParam(':flag',$flag);
    $stmt->bindParam(':staff_id',$staff_id);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->execute();
    echo "<script>window.location.href ='staff-page.php'</script>";    
    
}
?> 

