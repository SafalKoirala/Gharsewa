<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php 
 include('inc\dbconn.php')?>


<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register as a  Proffesional at GharSewa</div>
        <div class="card-body">
  <form  id= "regfrom" role="form" method="POST" action="">          
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">NAME</label>
                <input type="text" id="name" class="form-control" placeholder="NAME" name="name" required="required">
               </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" class="form-control" placeholder="Contact Number " name="contact_number" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="occupation">Occupation</label>
                <input type="text" id="occupation" class="form-control" placeholder="Occupation " name="occupation" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Address</label>
                <input type="text" id="address" class="form-control" placeholder="Address" name="address" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label>
                <input type="email" id="email" class="form-control" placeholder="Email address" name="email" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required="required">  
                </div>
        
              </div>
              
            <input type="submit" class="btn btn-success btn-block" name="submit"></input> 
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>

          </div>
          </div>
      </div>
    </div>
   </div> 
 
 
 
 
 <?php 
 if(isset($_POST['sumbit'])){
 $name =$_POST['name'];
 $contact = $_POST['contact_number'];
 $occupation = $_POST['occupation'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $password =md5($pass);
 $query = "INSERT INTO staff_table VALUES('$name', '$contact', '$occupation', '$address', '$email', '$password')";
 $data = mysqli_query($conn, $query);  
 }

?>