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
     
     
}
?>
<div class="container">
<div class="tab">
  
      <button class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen">Book Now</button>
      <button class="tablinks" onclick="openCity(event, 'two')">Details</button>
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
                  <img class="card-img-top" src="../b.jpg" alt="Card image cap" height="300px;" width="300px;">
            </div>
              <div class="name">
              <?php echo $staff['name'];?>
        </div>
        </div>
      
</div>
