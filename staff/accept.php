<?php session_start();?>
<?php require_once"../inc/dbconn.php"?>
<?php
$bookings =1 ;
$flag =1;
$staff_id=(int)$_SESSION['staff_id'];
$query = "UPDATE book SET  bookings=:bookings,flag=:flag  WHERE staff_id=:staff_id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':bookings',$bookings);
$stmt->bindParam(':flag',$flag);
$stmt->bindParam(':staff_id',$staff_id);
$stmt->execute();
echo "<script>window.location.href ='staff-page.php'</script>";    
?>