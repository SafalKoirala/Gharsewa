<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if(!isset($_SESSION['user_id'])){
    echo "<script>window.location.href ='../index.php'</script>";
    
  }?>
    <?php 
    $id = (int)$_SESSION['user_id'];
  $query="SELECT * FROM user WHERE id=:id ";
  $stmt=$pdo->prepare($query); 
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $user = $stmt->fetch();
  
?> 

 <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-userpic">
                    <img class="card-img-top rounded" src="../test.png" alt="Card image">
					
				</div>
			
			

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                    <?php echo $user['name'];?>
					</div>
				
				</div>
				

				<div class="profile-userbuttons">
					<a type="button" class="btn btn-success btn-sm" href="user-profile.php" >Edit Profile</a>
				</div>
				
			</div>
		</div> 
 

<?php 
$query ="SELECT * from services ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$services=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
		<div class="col-md-9">
            
            <div class="profile-content">
            <label for="search">Search for a service to book</label><br>
            <form class="form-inline my-2 my-lg-0" action="../search.php" method="POST">
            
    <input class="form-control mr-sm-3" type="text" name="postalcode" placeholder="Postal code" value="<?php echo $user['postalcode'];?>">
    <select name = "occupation"  class="form-control mr-sm-3" required>
    <option value = "">Select a service</option>
    <?php foreach ($services as $row){ ?>
            <option value = "<?php echo $row->services; ?>"> <?php echo $row->services;?></option>
            <?php }?>
            </select>
         &nbsp;  
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
            

            </div>
		</div>
	</div>
</div>
