<?php include('inc/head.php')?>
<?php include('inc/nav.php')?>
<?php require_once"./inc/dbconn.php"?>

<?php 
$query ="SELECT * from services ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$services=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
   <div class="row">
      
      <div class="col pt-2 offset-md-9">
         <p class="display-5">Already have an Account??<a href="staff-login.php" class="stretched-link">LOGIN</a><p>
      </div>
    </div>
  <div class="row mb-2  pl-5 get" >
    <h3 class="text-center display-4 "> GET CONNECTED TO OUR SERVICES</h3>
  </div>
  <div class="row">
    <div class="col ">
      <strong><h5><u> Register as a Provider at GharSEWA</u></h5></strong>
    </div>
  </div>
  <div class="row">
    <div class="col pt-3 mb-5 ml-2 cus">
    <form    method="POST" action="" enctype="multipart/form-data">          
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">NAME</label>
                <input type="text"  class="form-control" placeholder="Your Name" name="name" required="required" pattern="^[A-Za-z]{2,25}">
               </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text"  class="form-control" placeholder="Enter number only  eg. 98********** " name="contact_number" required="required" pattern="^[98][0-9]{9}" >
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="services">Services</label>     
            <select name = "occupation"  class="form-control" >
            <?php foreach ($services as $row){ ?>
            <option value = "<?php echo $row->services; ?>"> <?php echo $row->services;?></option>
            <?php }?>
            </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">City</label>
                <input type="text"  class="form-control" placeholder="City Name" name="address" required="required" pattern="[A-Za-z]+">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Experience</label>
                <input type="text"  class="form-control" placeholder="Experience in years eg.5" name="experience" required="required" pattern="[0-9]{1}">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label>
                <input type="email"  class="form-control" placeholder="Email" name="email" required="required" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Postal Code</label>
                <input type="text"  class="form-control" placeholder="Postal code " name="postalcode" required="required" pattern="[0-9]{5}">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <label for="password">Password</label>
                    <input type="password"  class="form-control" placeholder="Minimum 8 characters" name="password" required="required" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">  
                </div>
        
              </div>
              <div class="form-group">
              <div class="form-label-group">
                  <label for="images">Upload Image</label>
                    <input type="file" id="image" class="form-control" placeholder="" name="image" required="required" >  
                </div>
        
              </div>

              
            <input type="submit" class="btn btn-success btn-block" name="submit" value="submit"></input> 
          </form>
       
      </div>
    <div class="col mb-5">
         <img src="https://cdn.pixabay.com/photo/2016/12/07/09/41/refrigerator-1889068_960_720.jpg" class="img-fluid rounded float-right" alt="">
     </div>
  </div>
</div>
  
</div>
  

 

   <?php 
  if(isset($_POST['submit'])){
 $name =$_POST['name'];
 $contact = $_POST['contact_number'];
 $occupation = $_POST['occupation'];
 $address = $_POST['address'];
 $experience = $_POST['experience'];
 $postalcode = $_POST['postalcode'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $password =md5($pass);



 $query = "SELECT * FROM staff WHERE email=?";
$stmt=$pdo->prepare($query); 
  $stmt->execute([$email]);
  $staffEmail = $stmt->fetch();
    if($staffEmail){
      echo "<sodium_crypto_sign_ed25519_pk_to_curve25519>alert('Email already registered .If you have an account try logging in.')</sodium_crypto_sign_ed25519_pk_to_curve25519>";
      
    }

    
    
    
    
    else{
      
 $image=$_FILES["image"]["name"];
 $tmp_dir = $_FILES["image"]["tmp_name"];
 $imagesize =$_FILES["image"]["size"];
 $upload_dir ="images/";
 $imgExt =strtolower(pathinfo($image,PATHINFO_EXTENSION));
 $valid_extensions =array('jpeg','jpg','png','gif','pdf');
 $picProfile =rand(1000,1000000). ".".$imgExt;
 move_uploaded_file($tmp_dir,$upload_dir.$picProfile);
 

 $query = "INSERT INTO staff (name, contact, occupation , address, email,password, experience, postalcode,image) VALUES (:name, :contact,:occupation, :address, :email, :password, :experience, :postalcode,:image)";
 $stmt=$pdo->prepare($query);
 
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':contact',$contact);
 $stmt->bindParam(':occupation',$occupation);
 $stmt->bindParam(':address',$address);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':password',$password);
 $stmt->bindParam(':experience',$experience);
 $stmt->bindParam(':postalcode',$postalcode);
 $stmt->bindParam(':image',$picProfile);
 $stmt->execute(); 
 echo "<script>alert('Account created successfully. Login to continue')</script>"; 
  echo "<script>window.location.href ='staff-login.php'</script>";
 }
  } 
?> 
 
