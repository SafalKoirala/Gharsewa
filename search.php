<?php session_start();
  if(!isset($_SESSION['user_id'])){
    echo '<script>alert("You need to login first inoreder to search for services near you");</script>';
    echo "<script>window.location.href ='user-register.php'</script>";
  }

?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once("./inc/dbconn.php")?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
  $occupation = $_POST['occupation'];
  $postalcode = $_POST['postalcode'];
  $query="SELECT * FROM staff WHERE occupation =:occupation AND postalcode =:postalcode ";
  $stmt=$pdo->prepare($query); 
  $stmt->bindParam(':occupation',$occupation);
  $stmt->bindParam(':postalcode',$postalcode);
  $stmt->execute();
  $staff = $stmt->fetchAll(PDO::FETCH_OBJ);
  if(!$staff)
  {
      echo '<h3>No Professionals found, trying a different postal code might get you the help you need</h3>';
     ?> 
    <div style="margin:1%;margin-left:25%;">
    
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
    <input class="form-control mr-sm-3" type="text" name="postalcode" placeholder="postal code">
    <select name = "occupation"  class="form-control" required>
    <option value = "">Select a service</option>
            <option value = "plumber">Plumber</option>
            <option value = "electrician">Electrician</option>
            <option value = "carpenter">Carpenter</option>
            <option value = "cleaner">Cleaner</option>
            <option value = "movinghelpers">Moving Helpers</option>
            <option value = "painter">Painter</option> 
            </select>
         &nbsp; 
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<iframe src="https://worldpostalcode.com/nepal/madhyamanchal/bagmati/kathmandu" style="width:100%; height:100%;border: none;position: absolute;"></iframe>
 <?php }
  else{?>
    <div class="container"> 
    <h2><?php echo ($occupation); ?> near you</h2>
    <div class="row mt-4">
    <?php foreach ($staff as $row){ ?>
      <div class="col-md-4">
        <div class="card" style="width:300px">
          <img class="card-img-top rounded" src="test.png" alt="Card image" style="width:100%; height:10%;">
          <div class="card-body ">
            <h4 class="card-title"> <?php echo $row->name;?></h4>
            <p class="card-text">Address: <?php echo $row->address;?></p>
          <p class="card-text">Contact: <?php echo $row->contact;?></p>
          <p class="card-text">Experience: <?php echo $row->experience;?>yrs</p>
            <button href="#" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Book Now</button>
            <!-- <a href="" class="btn btn-primary " >View Profile</a> -->
          </div>
        </div>
        <br>
    </div>
  <?php }?>
    </div>
  </div>
    
  






          <!-- modal -->
      <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">BOOK NOW</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button> <!-- close button -->
            
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <form action="">
            <div class="form-group">
                <div class="form-label-group">
                <label for="date">Select Date</label>
                  <input type="date"  class="form-control"  name="date">
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
          
     
        </div>
      </div>
    </div>
  <?php } 
}
?> 

