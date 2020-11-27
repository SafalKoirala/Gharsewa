<?php session_start();?>
<?php include('inc\head.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
$id = (int)$_SESSION['staff_id'];
$query ="SELECT * from book where staff_id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$booking=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach ($booking as $row){?>
    <?php if ($row->rating>0) {?>
       <?php 
    $id = $row->user_id ;
    $query="SELECT name FROM user WHERE id=:id ";
    $stmt=$pdo->prepare($query); 
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $user = $stmt->fetch();
    ?>
            <?php echo ($user['name']);?>
            Rating:<?php echo $row->rating;?>
             <?php echo $row->review;?>
    
    
    
    <?php } ?>
    <?php } ?>