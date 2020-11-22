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
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update your details</div>
        <div class="card-body">
  <form    method="POST" action="">  
                
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">NAME</label>
                <input type="text"  class="form-control" placeholder="<?php echo $user['name'];?>" name="name" value="" disabled>
               </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text"  class="form-control" placeholder="<?php echo $user['contact'];?>" name="contact_number" value="" required="required">
               
              </div>
            </div>
          
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">City</label>
                <input type="text"  class="form-control" placeholder="<?php echo $user['address'];?>" name="address" value="" required="required">
               
              </div>
            </div>
           
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label>
                <input type="email"  class="form-control" placeholder="<?php echo $user['email'];?>" name="email" value="" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Postal Code</label>
                <input type="text"  class="form-control" placeholder="<?php echo $user['postalcode'];?>" name="postalcode" value=""required="required">
               
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