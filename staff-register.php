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
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register as a  Provider at GharSewa</div>
        <div class="card-body">
  <form    method="POST" action="" enctype="multipart/form-data">          
            <div class="form-group">
              <div class="form-label-group">
              <label for="name">NAME</label>
                <input type="text"  class="form-control" placeholder="NAME" name="name" required="required">
               </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="contact_number">Contact Number</label>
                <input type="text"  class="form-control" placeholder="Contact Number " name="contact_number" required="required">
               
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
                <input type="text"  class="form-control" placeholder="City" name="address" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Experience</label>
                <input type="text"  class="form-control" placeholder="Experience" name="experience" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="email">Email address</label>
                <input type="email"  class="form-control" placeholder="Email address" name="email" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
              <label for="address">Postal Code</label>
                <input type="text"  class="form-control" placeholder="Postal Code" name="postalcode" required="required">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <label for="password">Password</label>
                    <input type="password"  class="form-control" placeholder="Password" name="password" required="required">  
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
          <div class="text-center">
            <a class="d-block small mt-3" href="staff-login.php">Login Page</a>

          </div>
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

 $image=$_FILES["image"]["name"];
 $tmp_dir = $_FILES["image"]["tmp_name"];
 $imagesize =$_FILES["image"]["size"];
 $upload_dir ="images/";
 $imgExt =strtolower(pathinfo($image,PATHINFO_EXTENSION));
 $valid_extensions =array('jpeg','jpg','png','gif','pdf');
 $picProfile =rand(1000,1000000). ".".$imgExt;
 move_uploaded_file($tmp_dir,$upload_dir.$picProfile);
 
//  $query = "INSERT INTO staff (name, contact, occupation, address, email, password, experience, postalcode) VALUES (:name, :contact, :occupation, :address,  :email, :password, :experience, :postalcode)";
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
?> 
 
