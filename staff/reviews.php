<?php session_start();?>
<?php include('inc/head.php')?>
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
<!-- calculating average rating and total count -->
   <?php 
   $id = (int)$_SESSION['staff_id'];
  $query ="SELECT AVG(rating) as average FROM book WHERE staff_id=:id";
  $stmt = $pdo -> prepare($query);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $avg=$stmt->fetch();
  $average = $avg['average'];
  $avg =(int) $average;
  $query ="SELECT COUNT(rating) as count FROM book WHERE staff_id=:id";
  $stmt = $pdo -> prepare($query);
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $count=$stmt->fetch();
  ?>
  <div class="container">
  <!--displaying ratings -->
      <div class ="row mt-3">&nbsp;
  <div class="rate" style=" pointer-events:none;">
            
            <input type="radio" id="star1" name="rate" value="5"  <?php if($avg == 5){?> checked <?php }?>/>
            <label for="star1" >5 stars</label>
            <input type="radio" id="star2" name="rate" value="4" <?php if($avg == 4){?> checked <?php }?>  />
            <label for="star2" >4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" <?php if($avg == 3){?> checked <?php }?>/>
            <label for="star3" >3 stars</label>
            <input type="radio" id="star4" name="rate" value="2"  <?php if($avg == 2){?> checked <?php }?>/>
            <label for="star4" >2 stars</label>
            <input type="radio" id="star5" name="rate" value="1"   <?php if($avg == 1){?> checked <?php }?> />
            <label for="star5" >1 star</label>
         </div>
         </div> 
         <br>    
  <h6><?php echo(round($average,1)); ?> average rating based on <?php echo(int)($count['count']); ?> reviews</h6>
  <br>
  <h4>Reviews</h4>
  <div class="row mt-4">
<?php foreach ($booking as $row){?>
    <?php if ($row->rating>0) {?>
       <?php 
    $id = $row->user_id ;
    $query="SELECT * FROM user WHERE id=:id ";
    $stmt=$pdo->prepare($query); 
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $user = $stmt->fetch();
    ?>
   
  <!-- displaying reviews -->
      
    <div class="col-md-4">
      <div class="card" style="width:300px">
         <div class="card-header"><img src="../images/<?php echo($user['image']);?>" alt="Avatar" style="width:80px"><?php echo ($user['name']);?></div>
         <div class="card-body"> <?php echo $row->review;?></div> 
      
      
      </div>
    </div>
    
    <?php } ?>
    <?php } ?>
  </div>
  </div>         
           
            
    
    
    
    
    
