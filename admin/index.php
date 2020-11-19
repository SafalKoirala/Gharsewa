<?php include('inc\head.php')?>
<?php require_once("../inc/dbconn.php")?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">
  <a class="navbar-brand">GharSewa</a>
</nav>



<div class="container">
      <div class="card card-login mx-auto mt-3">
        <div class="card-header">Admin Login</div>
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
        
            <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
          </form>
         
        </div>
      </div>
    </div>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        
    
        $query="SELECT * FROM admin WHERE email=:email AND password=:password";
        $stmt =$pdo->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
         $admin=$stmt->fetch();
         if(!empty($admin)){
            
            // $_SESSION['logged_user']=$user;
            echo "<script>window.location.href ='dashboard.php'</script>";
         }
         else
         {
             echo '<h2>INVALID LOGIN</h2>';
         }
    }
    
    ?>