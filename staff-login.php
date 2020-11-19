<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"./inc/dbconn.php"?>

<div class="container">
      <div class="card card-login mx-auto mt-3">
        <div class="card-header">Providers Login</div>
        <div class="card-body"> 
          <form role="form" method="POST" action="">
            <div class="form-group">
              <div>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
              <div>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="login" value="login"></input>
          </form>
         
        </div>
      </div>
    </div>
    
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
            
            // $_SESSION['logged_user']=$user;
            echo "<script>window.location.href ='staff/staff-profile.php'</script>";
         }
         else
         {
            echo '<script>alert("INVALID LOGIN,\nPLEASE TRY AGAIN WITH VALID CREDENTIALS")</script>';
         }
     }
    
    ?>