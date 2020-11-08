<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>


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
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="/register">Register an Account</a>
          </div>
        </div>
      </div>
    </div>
    <?php include('inc\foot.php')?>