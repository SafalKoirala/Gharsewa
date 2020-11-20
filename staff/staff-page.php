<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if(!isset($_SESSION['staff_id'])){
    echo "<script>window.location.href ='../index.php'</script>";
    
  }?>
    <?php 
    $id = (int)$_SESSION['staff_id'];
  $query="SELECT * FROM staff WHERE id=:id ";
  
  $stmt=$pdo->prepare($query); 
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $staff = $stmt->fetch();
  
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
                    <?php echo $staff['name'];?>
					</div>
					<div class="profile-usertitle-job">
                    <?php echo $staff['occupation'];?>
					</div>
				</div>
				

				<div class="profile-userbuttons">
					<a type="button" class="btn btn-success btn-sm" href="staff-profile.php" >Edit Profile</a>
				</div>
				
			</div>
		</div> 
		<div class="col-md-9">
            <div class="profile-content">
              <table>
             <tr>   
                 <th>Request Lists</th>
               </tr>
               <tr>
               
               </tr> 
                </table> 
            

            </div>
		</div>
	</div>
</div>
