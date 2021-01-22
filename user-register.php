<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php include('inc\dbconn.php')?>

<div class="container">
   <div class="row">
      
      <div class="col pt-2 offset-md-9">
         <p class="display-5">Already have an Account??<a href="#" class="stretched-link">LOGIN</a><p>
      </div>
    </div>
  <div class="row mb-2  pl-5 get" >
    <h3 class="text-center display-4 "> GET CONNECTED TO OUR SERVICES</h3>
  </div>
  <div class="row">
    <div class="col ">
      <strong><h5><u> Register as a Customer at GharSEWA</u></h5></strong>
    </div>
  </div>
  <div class="row">
    <div class="col pt-3 mb-5 ml-2 cus">
     <form  id= "regfrom" role="form" method="post" action=""  enctype="multipart/form-data" >

            
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">FULLNAME</label>
                <input type="text" id="name" class="form-control" placeholder=" Your Name" name="name" required="required" pattern="^[A-Za-z][A-Za-z ,.'-]+">
               
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" class="form-control" placeholder="Mobile Number(98********) " name="contact_number" required="required" pattern="^[98][0-9]{9}">
               
              </div>
            </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Address</label>
                <input type="text" id="address" class="form-control" placeholder="City Name" name="address" required="required"pattern="[A-Za-z]+">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="postalcode">Postal code</label>
                <input type="text" id="address" class="form-control" placeholder="Postal Code" name="postalcode" required="required" pattern="[0-9]{5}">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label><span id="span"></span>
                <input type="email" id="email" class="form-control" placeholder="Email" name="email" required="required" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Must contain 8 characters" name="password" required="required"pattern="^(?=.* @#[A-Za-z0-9]){8,}$">  
                </div>
        
              </div>
              <div class="form-group">
              <div class="form-label-group">
                  <label for="images">Upload Image</label>
                    <input type="file" id="image" class="form-control" placeholder="" name="image" required="required" >  
                </div>
        
              </div>
            
              
            <input type="submit" class="btn btn-success btn-block" id="register" name="submit" value="submit"></input> 
       </form>
       
      </div>
    <div class="col mb-5">
         <img src="https://image.freepik.com/free-photo/portrait-smiling-handyman-with-tools-paper-showing-thumbs-up-sign-isolated-white-background_186202-4532.jpg" class="img-fluid rounded float-right" alt="">
     </div>
  </div>
</div>
  
</div>

    <?php
    if(isset($_POST['submit'])){
 $name =$_POST['name'];
 $contact = $_POST['contact_number'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $postalcode = $_POST['postalcode'];
 $password =md5($pass);




      
    
   


  $image=$_FILES["image"]["name"];
  $tmp_dir = $_FILES["image"]["tmp_name"];
  $imagesize =$_FILES["image"]["size"];
  $upload_dir ="images/";
  $imgExt =strtolower(pathinfo($image,PATHINFO_EXTENSION));
  $valid_extensions =array('jpeg','jpg','png','gif','pdf');
  $picProfile =rand(1000,1000000). ".".$imgExt;
  move_uploaded_file($tmp_dir,$upload_dir.$picProfile);



   $query = "INSERT INTO user (name, contact, address, email,password,postalcode,image) VALUES (:name, :contact, :address, :email, :password, :postalcode, :image)";
 
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':contact',$contact);
 $stmt->bindParam(':address',$address);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':password',$password);
 $stmt->bindParam(':postalcode',$postalcode);
 $stmt->bindParam(':image',$picProfile);
 $stmt->execute();  
 echo "<script>alert('Account created successfully. Login to continue')</script>";
 echo "<script>window.location.href ='user-login.php'</script>";
 
    
  }   
?> 
<script type="text/javascript">
  $(document).ready(function(){
    
       $('#email').blur(function(){ 
        var email=$(this).val();
                $.ajax({
        url:"check.php",
        method:"POST",
        data:{email:email},
        dataType:"text",
        success:function(data){
          $('#span').html(data);
        }


      });
    });
  });
</script>
 