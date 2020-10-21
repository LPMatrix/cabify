<?php 
if (@$_GET['error']==1) {
    $errMsg="Please, enter the day";
} elseif (@$_GET['error']==2) {
    $errMsg="Please, enter the month";
} elseif (@$_GET['error']==3) {
    $errMsg="Please, enter the year";
}elseif (@$_GET['error']==4) {
    $errMsg="Please, add your contact number";
}elseif (@$_GET['error']==5) {
    $errMsg="Please, select a destination";
}elseif (@$_GET['error']==8) {
    $errMsg="Ha!, You can't book to the past";
}
 ?>

<?php include 'header.php';?>

<!-- banner -->
<div class="banner" id="cool">  	   
    <!-- <img src="images/car1.png"  class="img-responsive" alt="slide"> -->
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Cabify</h1>
                <h5  class="animated fadeInUp">Easy booking with comfy journey and excellent customer service.</h5>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInLeftBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<!-- banner-->


<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-7 col-md-8">
    <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><img src="images/unilorin.jpg"></div>
</div>
<div class="col-sm-5 col-md-4">
<h3>Reservation</h3>

            <?php if (isset($errMsg)) { ?>
                                            
                    <div class="alert alert-danger alert-dismissible">
                        <p><?php echo $errMsg; ?> </p>
                    </div>;

            <?php }
            ?>
    <form role="form" class="wowload fadeInRight" method="post" action="book.php">
        <div class="form-group">
            <input type="number" class="form-control"  placeholder="Card Number" name="card" required="">
        </div>
        <div class="row">
        <div class="col-sm-5">
        <div class="form-group">
            <label>Expiry month</label>
            <input type="number" class="form-control"  placeholder="MM" name="mon" required="" max="12" min="1">
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
            <label>Expiry year</label>
            <input type="number" class="form-control"  placeholder="YY" name="yea" required="" max="90" min="17">
        </div>
        </div>
        <div class="col-sm-3">
        <div class="form-group">
            <label>CVV</label>
            <input type="number" class="form-control"  placeholder="CVV" name="qty" required="">
        </div>
        </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Name" name="name" required="">
        </div>
        <div class="form-group">
            <input type="email" class="form-control"  placeholder="Email" name="email" required="">
        </div>        
        <div class="form-group">
            <div class="row">
            
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Contact Number" name="contact" required="">
                </div>
            </div>      
            <div class="col-xs-6">
            <select class="form-control" name="route">
              <option value="empty">Destination</option>
              <?php
                        include('config.php');
                        $result = mysqli_query($con,"SELECT * FROM route");
                        while($row = mysqli_fetch_array($result))
                            {
                                echo '<option value="'.$row['id'].'">';
                                echo $row['route'].'  :'.$row['type'].'  :'.$row['time'];
                                echo '</option>';
                            }
                        ?>
            </select>
            </div>

            </div>
        </div>
        <div class="form-group">
            <input type="number" class="form-control"  placeholder="Number of seats" name="qty" required="" min="0" max="20">
        </div>

        <div class="form-group">
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="day" id="expiry-month" required="">
                <option>Date</option>
                <?php 
                for ($i=1; $i <= 31; $i++) { 
                    echo "<option>$i</option>";
                 } ?>
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="month" id="month" required="">
                <option value="empty">Month</option>
                <option value="1">Jan (01)</option>
                <option value="2">Feb (02)</option>
                <option value="3">Mar (03)</option>
                <option value="4">Apr (04)</option>
                <option value="5">May (05)</option>
                <option value="6">June (06)</option>
                <option value="7">July (07)</option>
                <option value="8">Aug (08)</option>
                <option value="9">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-4">
              <select class="form-control" name="year" required="">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
            </div>
          </div>
        </div>

        <button class="btn btn-default" type="submit" name="submit">Book</button>
    </form>    
</div>
</div>  
</div>
</div>
<!-- reservation-information -->



<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/saloon.jpg" class="img-responsive" alt="slide"></div>                
                <div class="item  height-full"><img src="images/photos/saloon.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/saloon.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Bus<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/saloon.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/saloon.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/saloon.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Car<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="images/photos/saloon.jpg" class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/saloon.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/saloon.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Delux<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>
</div>
</div>
<!-- services -->


<?php include 'footer.php';?>