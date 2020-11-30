<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once("../inc/dbconn.php")?>
<?php

$user_id=(int)$_SESSION['user_id'];
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];  
    $query="SELECT * FROM staff WHERE  id=:id  ";
    $stmt=$pdo->prepare($query); 
    $stmt->bindParam(':id',$id); 
    $stmt->execute();
    $staff = $stmt->fetch();
    //reviews ko lagi 
    $query ="SELECT * from book where staff_id=:id ";
    $stmt = $pdo -> prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $booking=$stmt->fetchAll(PDO::FETCH_OBJ);
     
}
?>
<!-- staff ko rating dekhauna lai -->
<?php
$id = $staff['id'];
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
<div class="tab">
  
      <button class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen">Book Now</button>
      <button class="tablinks" onclick="openCity(event, 'two')">Details</button>
      <button class="tablinks" onclick="openCity(event, 'three')">Reviews</button>
      <div id="one" class="tabcontent">
      <form action="book.php" method="POST">
      <input type="hidden" name="staff_id" value="<?php echo $staff['id'];?>"></input>
            <div class="form-group">
                <div class="form-label-group">
                <label for="date">Select Date</label>
                  <input type="date"  class="form-control"  name="date" value="">
                </div>
              </div>
             
              <div class="form-group">
                <div class="form-label-group">
                <label for="time">Select Time</label>
                  <input type="time"  class="form-control"  name="time">
                </div>
              </div> 
              <div class="form-group">
                <div class="form-label-group">
                <label for="problem">Describe your Problem</label>
                  <textarea type="text"  class="form-control"  name="problem"></textarea>
                </div>
              </div> 
                  <input type="submit" class="btn btn-success btn-block" name="submit" value="submit"></input>
            </form>
 
</div>
<div id="two" class="tabcontent">
<h4 class="card-title"> <?php echo $staff['name'];?></h4>
          <p class="card-text">Address: <?php echo $staff['address'];?></p>
          <p class="card-text">Contact: <?php echo $staff['contact'];?></p>
          <p class="card-text">Experience: <?php echo $staff['experience'];?>yrs</p>
          
              
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
         
          <br> <br>
          
          <p><?php echo(round($average,1)); ?> average rating based on <?php echo(int)($count['count']); ?> reviews</p>
         
         
</div>
<div id="three" class="tabcontent">  
  <table class="table table-striped">
  <tr>
  <th>Name</th>
  <th>Review</th>
  </tr>
  <tr>
  
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
  <td><?php echo ($user['name']);?></td>
  <td><?php echo $row->review;?></td>
 
  </tr>
  <?php } ?>
    <?php } ?>
  </table>
      
    
  </div>


</div> 

<script>
function openCity(evt, cityName) {
var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

</script>


    <!-- user name ra image display gareko -->
       <div class="inside">
      
            <div class="card" style=" border-radius: 200px; background-color:skyblue;">
                  <img class="card-img-top" src="../images/<?php echo $staff['image']; ?>" alt="Card image cap" height="300px;" width="300px;">
            </div>
              <div class="name">
              <?php echo $staff['name'];?>
        </div>
        </div>
      
</div>
