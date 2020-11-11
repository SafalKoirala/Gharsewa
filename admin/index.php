<?php include('inc\head.php')?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">
  <a class="navbar-brand">GharSewa</a>
</nav>



<div class="container">
      <div class="card card-login mx-auto mt-3">
        <div class="card-header">Login</div>
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