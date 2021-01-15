<?php session_start();?>
<?php include('../inc/head.php')?>
<?php include('inc/nav.php')?>
<?php require_once("../inc/dbconn.php")?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
  $occupation = $_POST['occupation'];
  $postalcode = $_POST['postalcode'];
  $query="SELECT * FROM staff WHERE occupation =:occupation AND postalcode =:postalcode ";
  $stmt=$pdo->prepare($query); 
  $stmt->bindParam(':occupation',$occupation);
  $stmt->bindParam(':postalcode',$postalcode);
  $stmt->execute();

  $staff = $stmt->fetchAll();
  
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
        <form class="card" style="width:300px" action="results.php" method="POST">
          <img class="card-img-top rounded" src="../images/<?php echo $row['image'] ?>" alt="Card image" style="width:100%; height:10%;">
          <div class="card-body ">
           <input type="hidden" name="id" value="<?php echo $row['id'];?>"></input> 
           <h4 class="card-title"> <?php echo $row['name'];?></h4>
          <p class="card-text">Address: <?php echo $row['address'];?></p>
          <p class="card-text">Contact: <?php echo $row['contact'];?></p>
          <p class="card-text">Experience: <?php echo $row['experience'];?>yrs</p>
          
          
            <button type="submit"  class="btn btn-primary " name="submit" value="Book Now">Book Now</button>
           
          </div>
        </form>
        <br>
    </div>
  <?php }?>
    </div>
  </div>
   
  <?php } 
}
?> 
