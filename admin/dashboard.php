<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once("../inc/dbconn.php")?>

<?php 
$query ="SELECT ID from user ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
$totaluser=$stmt->rowCount();
?>


<div class="row">
  <div class="col-sm-3"  style="background-color:blue;">
    <h2>Users</h2><br>
    <h3><?php echo $totaluser ?></h3>
    
  </div>
  <?php 
$query ="SELECT ID from staff ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
$totalstaff=$stmt->rowCount();
?>
  <div class="col-sm-3"  style="background-color:orange;">
    <h2>Staffs</h2><br>
    <h3><?php echo $totalstaff ?></h3>
  </div>
  <?php 
$query ="SELECT ID from services ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
$totalcat=$stmt->rowCount();
?>
  <div class="col-sm-3"  style="background-color:blue;">
     
     <h2>Total Services</h2><br>
    <h3><?php echo $totalcat ?></h3> 
  </div>
</div>

 
<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add  a Category </div>
        <div class="card-body">
  <form    method="POST" action="">          
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">Add a category</label>
                <input type="text"  class="form-control" placeholder="category" name="services" required="required">
               </div>
              </div> 
            <input type="submit" class="btn btn-success btn-block" name="submit" value="ADD"></input> 
          </form>
          </div>
      </div>
    </div>
   </div> 

   <div class="container">
<div class="card  mx-auto mt-3">
        <div class="card-header">Delete a Category</div>
        
        <div class="card-body ">
        <?php 
$query ="SELECT * from services ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$services=$stmt->fetchAll();
?>


     <div class="form-group">
     <form class="form-inline my-2 my-lg-0" action="delete.php" method="POST">
 

    <select name = "services"  class="form-control mr-sm-3" required>
    <option name = "">Select a service</option>

    <?php foreach ($services as $row){ ?>
            <option value = "<?php echo $row['services']; ?>"> <?php echo $row['services'];?></option>
            <?php }?>
            </select>
         &nbsp;  
      <button class="btn btn-success my-2 my-sm-0" type="submit">Delete</button>
    </form
    
                    
                     
                      
                 </div>
      <hr>
   <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Services</th>
      <th scope="col">Providers</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($services as $row){ ?>
    <tr>
     
      <td><?php echo $row['services']; ?></td>
      <?php 
      $occupation = $row['services'];
      //counting the number of staffs registered to a particular service
       $query = "SELECT id FROM staff WHERE occupation=:occupation";
       $stmt = $pdo->prepare($query);
       $stmt->bindParam(':occupation',$occupation);
       $stmt->execute();
       $results=$stmt->fetchAll();
       $total=$stmt->rowCount();
      
      ?>


      <td><?php echo($total) ; ?></td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>


<!-- add service -->
   <?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $services =$_POST['services'];
 $query = "INSERT INTO services (services) VALUES (:services)";
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':services',$services);
 $stmt->execute(); 
 $LastInsertId=$pdo->lastInsertId();

 if ($LastInsertId>0) {
  echo '<script>alert("Category has been added.")</script>';
echo "<script>window.location.href ='dashboard.php'</script>";
}
else
  {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }


} 
 
?> 
