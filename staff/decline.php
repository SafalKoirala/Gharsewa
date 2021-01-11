<?php session_start();?>
<?php require_once"../inc/dbconn.php"?>
<?php session_start();?>
<?php require_once"../inc/dbconn.php"?>
<?php
//sets the flags to show requests are declined
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user_id =$_POST['user_id'] ;
     $bookings =0 ;
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