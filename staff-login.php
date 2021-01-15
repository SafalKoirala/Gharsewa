<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"./inc/dbconn.php"?>


<section class="form my-5 mx-5">
   <div class="container">
     <div class="row no-gutters">
      <div class="col-lg-5">
        <img src="https://media.istockphoto.com/photos/ok-for-cleaning-picture-id471666399?k=6&m=471666399&s=612x612&w=0&h=_pq6KuKY4ERX2OxoRWFhDfldCQ65TRIY_4Oa9Z2M3yA=" class="img-fluid stafflog"alt="">
      </div>
      <div class="col-lg-7 px-5 pt-5"><h1 class="heading1" >GharSEWA Login</h1>
        <h3 class="py-3">Sign in to your Account </h3>
        <form method="POST">
          <div class="form-row">
            <div
            class="col-lg-7">
              <input type="email" name="email" placeholder="Email" class="form-control my-3 p-4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
            </div>
            
          </div>
          <div class="form-row">
            <div
            class="col-lg-7">
              <input type="password" name="password" placeholder="Password" class="form-control my-3 p-4" >
            </div>
            
          </div>
          <div class="form-row">
            <div
            class="col-lg-7">
              <button type="submit" class="btn1 mt-3 mb-3 loginbtn">login</button>
            </div>
            
          </div>
          <p> Don't have an account??<a href="staff-register.php"> Register Now</a></p>
        </form>
      </div>
     </div>
   </div>
</section>
</div>
    
<?php include('inc\foot.php')?>
    
<?php include('inc\foot.php')?>
    
    <?php
     
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $password=md5($pass);
    
        $query="SELECT * FROM staff WHERE email=:email AND password=:password";
        $stmt =$pdo->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
         $staff=$stmt->fetch();
         if(!empty($staff)){
            
          
          $_SESSION['staff_id']=$staff['id'];
          
             echo "<script>window.location.href ='staff/staff-page.php'</script>";
            
         }
         else
         {
            echo '<script>alert("INVALID LOGIN,\nPLEASE TRY AGAIN WITH VALID CREDENTIALS")</script>';
         }
     }
    
    ?>