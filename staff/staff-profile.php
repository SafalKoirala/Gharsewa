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
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update your details</div>
        <div class="card-body">
  <form    method="POST" action="">  
                
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">NAME</label>
                <input type="text"  class="form-control" placeholder="NAME" name="name" value="<?php echo $staff['name'];?>" disabled>
               </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text"  class="form-control" placeholder="Contact Number " name="contact_number" value="<?php echo $staff['contact'];?>" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="occupation">Occupation</label>     
              <input class="form-control" value="<?php echo $staff['occupation'];?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">City</label>
                <input type="text"  class="form-control" placeholder="City" name="address" value="<?php echo $staff['address'];?>" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Experience</label>
                <input type="text"  class="form-control" placeholder="Experience" name="experience" value="<?php echo $staff['experience'];?>" disabled>
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label>
                <input type="email"  class="form-control" placeholder="Email address" name="email" value="<?php echo $staff['email'];?>" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Postal Code</label>
                <input type="text"  class="form-control" placeholder="Postal Code" name="postalcode" value="<?php echo $staff['postalcode'];?>"required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <label for="password">Password (Leave blank to use existing)</label>
                    <input type="password"  class="form-control" placeholder="Password" name="password">  
                    
                </div>
        
              </div>
              
            <input type="submit" class="btn btn-success btn-block" name="submit" value="Update"></input> 
          </form>
          
          </div>
      </div>
    </div>
   </div> 