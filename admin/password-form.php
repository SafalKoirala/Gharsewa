<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>



<div class="container">
      <div class="card card-login mx-auto mt-3">
        <div class="card-header">Change Password</div>
        <div class="card-body"> 
          <form role="form" method="POST" action="">
            <div class="form-group">
              <div>
                <input type="password" id="inputPassword" class="form-control" placeholder="Old Password" name="password" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
              <div>
                <input type="password" id="inputPassword" class="form-control" placeholder="New Password" name="password" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
              <div>
                <input type="password" id="inputPassword" class="form-control" placeholder="Re-enter New Password" name="password" required="required">
              </div>
            </div>
          
            <input type="submit" class="btn btn-success btn-block" name="Change Password"></input>
          </form>
          
        </div>
      </div>
    </div>