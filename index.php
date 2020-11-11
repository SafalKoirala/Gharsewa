<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>

<div class ="search-bar">
  
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
      <input class="form-control mr-sm-3" type="test" name="search" placeholder="Search for a service" aria-label="Search ">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</div>
<div class="services">
  <h2>Most Popular Services</h2>
  <!-- sabai bhanda dherai booked bhako services haru dekhauney OR kei services haru ya batw click garda search huney garna milney  -->
  <div  class="categories">
  <ul class="list-group list-group-horizontal">
    <li class="list-group-item">Plumber</li>
    <li class="list-group-item">Carpenter</li>
    <li class="list-group-item">Electrician</li>
    <li class="list-group-item">Moving Help</li>
  </ul>
</div>
</div>
<div>
<h2>REVIEWS</h2>

<!-- user reviews and staff reviews -->
 <!-- reviews haru dynamically dekhana milney -->
</div>
<div>
<h2>How it works</h2>

<!-- search for a service -> choose a proffesional ->book a professional -->
</div>
<?php include('inc\foot.php')?>