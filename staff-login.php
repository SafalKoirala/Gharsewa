<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>


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