<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>


<div class="container">
  <h2>Search Results:</h2>
  <div class="card" style="width:300px">
    <img class="card-img-top rounded" src="" alt="Card image" style="width:100%; height:10%;">
    <div class="card-body">
      <h4 class="card-title">NAME</h4>
      <p class="card-text">Address:</p>
      <p class="card-text">Rating:</p>
      <p class="card-text">(Rated by _ people)</p>

      <button href="#" class="btn btn-primary stretched-link" data-toggle="modal" data-target="#myModal">Book Now</button>
    </div>
        <!-- modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">BOOK NOW</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button> <!-- close button -->
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="">
          <div class="form-group">
              <div class="form-label-group">
              <label for="date">Select Date</label>
                <input type="date"  class="form-control"  name="date">
              </div>
            </div>
           
            <div class="form-group">
              <div class="form-label-group">
              <label for="time">Select Time</label>
                <input type="time"  class="form-control"  name="time">
              </div>
            </div> 
            <div class="form-group">
              <div class="form-label-group">
              <label for="problem">Describe your Problem</label>
                <textarea type="text"  class="form-control"  name="problem"></textarea>
              </div>
            </div> 
                <input type="submit" class="btn btn-success btn-block" name="submit" value="submit"></input>
          </form>
        </div>
        
   
      </div>
    </div>
  </div>