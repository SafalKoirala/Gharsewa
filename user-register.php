<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php include('inc\dbconn.php')?>

<div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register as a Customer at GharSewa</div>
        <div class="card-body">
  <form  id= "regfrom" role="form" method="post" action="">

            
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">NAME</label>
                <input type="text" id="name" class="form-control" placeholder="NAME" name="name" required="required">
               
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" class="form-control" placeholder="Contact Number " name="contact_number" required="required">
               
              </div>
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
            </div>
              
            <input type="submit" class="btn btn-success btn-block" name="submit" value="submit"></input> 
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="user-login.php">Login Page</a>

          </div>
          </div>
      </div>
    </div>

    


    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
 $name =$_POST['name'];
 $contact = $_POST['contact_number'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $password =md5($pass);
 $query = "INSERT INTO user (name, contact, address, email,password) VALUES (:name, :contact, :address, :email, :password)";
 
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':contact',$contact);
 $stmt->bindParam(':address',$address);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':password',$password);
 $stmt->execute();  
 echo "<script>window.location.href ='./user/user-page.php'</script>";
 }
?> 
 