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
                <input type="text"  class="form-control" placeholder="<?php echo $staff['name'];?>" name="name" value="" disabled>
               </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text"  class="form-control" placeholder="<?php echo $staff['contact'];?> " name="contact_number" value="" >
               
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
                <input type="text"  class="form-control" placeholder="<?php echo $staff['address'];?>" name="address" value="" >
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Experience</label>
                <input type="text"  class="form-control" placeholder="<?php echo $staff['experience'];?>" name="experience" value="" disabled>
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label>
                <input type="email"  class="form-control" placeholder="<?php echo $staff['email'];?>" name="email" value="">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Postal Code</label>
                <input type="text"  class="form-control" placeholder="<?php echo $staff['postalcode'];?>" name="postalcode">
               
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
   <?php
   if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              $id = (int)$_SESSION['staff_id'];

              $contact = $_POST['contact_number'];
              
              // $address = $_POST['address'];
              // $postalcode = $_POST['postalcode'];
              // $email = $_POST['email'];
              // $pass = $_POST['password'];
              $password =md5($pass);

                if($pass == "")
                {
                    $query = "UPDATE `staff` SET  `contact`=:contact,  WHERE `id`=:id";
                }
                else
                {
                    $query = "UPDATE `staff` SET `contact`=:contact,  `password`=:password WHERE `id`=:id";
                }

                $stmt = $pdo->prepare($query);
                
                 $stmt->bindParam(':id',$id);
               
                $stmt->bindParam(':contact',$contact);
                // $stmt->bindParam(':occupation',$occupation);
                // $stmt->bindParam(':address',$address);
                // $stmt->bindParam(':email',$email);
                // $stmt->bindParam(':password',$password);
                // $stmt->bindParam(':experience',$experience);
                // $stmt->bindParam(':postalcode',$postalcode);

                if($pass != "")
                {
                    $stmt->bindParam(':pwd',$password);
                }

                $stmt->execute();
               

              }               
?>
