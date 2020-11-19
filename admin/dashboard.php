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

   <!-- <div class="container">
<div class="card  mx-auto mt-3">
        <div class="card-header">Update your about us content</div>
        
        <div class="card-body ">
 

     <div class="form-group">
         <label for="vat" class=" form-control-label"> Add Description</label>
         <textarea type="text" name="pagedes" id="pagedes" required="true"class="form-control"></textarea></div>
                       
                     </div>
                    
                     <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                             <i class="fa fa-dot-circle-o"></i> Update
                         </button></p>
                      
                 </div>
                 </form>
</div> -->



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