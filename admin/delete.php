<?php require_once("../inc/dbconn.php")?>
<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $services =$_POST['services'];
 $query="DELETE FROM  services WHERE services=:services";
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':services',$services);
 $stmt->execute();
 echo '<script>alert("Deleted Successfully")</script>';
 echo "<script>window.location.href ='dashboard.php'</script>";
 }
?> 