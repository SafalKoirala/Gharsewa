<?php session_start();?>
<?php include('inc/head.php')?>
<?php include('inc/nav.php')?>
<?php require_once("./inc/dbconn.php")?>
<h5>YOU NEED TO CREATE AN ACCOUNT TO BOOK SERVICES.</h5>
    <p>If you don't have an account <a href="user-register.php">create</a> one now.</p>
    <p>If you have an account <a href="user-login.php">login</a> to continue</p>

  
    <div class="container" style="margin-left:40%"> 
    <div class="row mt-4">
    
      <div class="col-md-4">
        <div class="card" style="width:300px">
          <img class="card-img-top rounded" src="b.jpg" alt="Card image" style="width:100%; height:10%;">
          <div class="card-body ">
            <h4 class="card-title"> NAME</h4>
            <p class="card-text">Address</p>
          <p class="card-text">Contact</p>
          <p class="card-text">Experience</p>
            <button href="#" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Book Now</button>
            
          </div>
        </div>
        <br>
    </div>
  
    </div>
  </div>
    
  








