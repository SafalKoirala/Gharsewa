<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>

<div class ="search-bar">
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
    <input class="form-control mr-sm-3" type="text" name="postalcode" placeholder="postal code">
    <select name = "occupation"  class="form-control" required>
    <option value = "">Select a service</option>
            <option value = "plumber">Plumber</option>
            <option value = "electrician">Electrician</option>
            <option value = "carpenter">Carpenter</option>
            <option value = "cleaner">Cleaner</option>
            <option value = "movinghelpers">Moving Helpers</option>
            <option value = "painter">Painter</option> 
            </select>
         &nbsp;  
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

</div>
<div class="container">
  <center><h2>Our Services</h2></center>
  <div class="card-columns text-white" style="width: 40rem;margin-left:17%;">
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text">Plumber</p>
        </div>
      </div>
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text">Carpenter</p>
        </div>
      </div>
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text">Electrician</p>
        </div>
      </div>
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text">Moving Helpers</p>
        </div>
      </div>  
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text">Cleaner</p>
        </div>
      </div>
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text">Carpenter</p>
        </div>
      </div>
      <!-- <div class="card bg-danger">
      <div class="card-body text-center">
        <p class="card-text">Something last</p>
      </div>
    </div> -->
    
  </div>
  
</div>
<div>

</div>
<div>
<div class="container">
    <center> <h2>How it works</h2> </center>
    <div class="card-deck">
        <div class="card ">
          <div class="card-body text-center">
            <p class="card-text">When you need a professional for help,</p>
            <p class="card-text">GharSewa Finds them for you for free</p>
            
            
          </div>
        </div>
        <div class="card ">
          <div class="card-body text-center">
            <p class="card-text">Choose a Service</p>
            <p class="card-text">Book a Proffesional</p>
            <p class="card-text">Pick date and time</p>
            
          </div>
        </div>
        <div class="card ">
          <div class="card-body text-center">
            <p class="card-text">Pay locally</p>
            
          </div>
        </div>
    </div>
</div>


<?php include('inc\foot.php')?>