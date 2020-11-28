<?php session_start();?>
<?php include('../inc/head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
$id = (int)$_SESSION['staff_id'];
$query ="SELECT * from book where staff_id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$booking=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
   <?php 
   $id = (int)$_SESSION['staff_id'];
  $query ="SELECT AVG(rating) as average FROM book WHERE staff_id=:id";
  $stmt = $pdo -> prepare($query);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $avg=$stmt->fetch();
  $query ="SELECT COUNT(rating) as count FROM book WHERE staff_id=:id";
  $stmt = $pdo -> prepare($query);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $count=$stmt->fetch();
  ?>
  <div class="container">
  <h2>Average rating:<?php echo(int)($avg['average']); ?>/5 </h2>
  <h3> Rated by:<?php echo(int)($count['count']); ?> customers</h3>
  Reviews
  <div class="row mt-4">
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
   
  
      
    <div class="col-md-4">
      <div class="card" style="width:300px">
         <div class="card-header">User Name:<?php echo ($user['name']);?></div>
         <div class="card-body"> <?php echo $row->review;?></div> 
         <div class="card-footer"> Rating:<?php echo $row->rating;?>/5</div>
      </div>
    </div>
    <?php } ?>
    <?php } ?>
  </div>
  </div>         
           
            
    
    
    
    
    
