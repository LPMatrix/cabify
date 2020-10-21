<?php
if (@$_GET['error']==1) {
    $errMsg="Please, enter the day";
} elseif (@$_GET['error']==2) {
    $errMsg="Please, enter the month";
} elseif (@$_GET['error']==3) {
    $errMsg="Please, enter the year";
}elseif (@$_GET['error']==4) {
    $errMsg="Please, enter ticket ID";
}elseif (@$_GET['error']==5) {
    $errMsg="Please, select a destination";
}elseif (@$_GET['error']==6) {
    $errMsg="Ticket ID does not exist";
}elseif (@$_GET['error']==7) {
    $errMsg="Enter number of seats";
}elseif (@$_GET['done']==1) {
    $Msg="You have successfully rescheduled ";
}

include('config.php');
?>

<?php include 'header.php'; ?>
<div class="container spacer">
<div class="row">

<div class="col-sm-4 col-md-offset-4">
<h3>Reschedule Ticket</h3>

            <?php if (isset($errMsg)) { ?>
                                            
                    <div class="alert alert-danger alert-dismissible">
                        <p><?php echo $errMsg; ?> </p>
                    </div>;

            <?php }
            ?>
            <?php if (isset($Msg)) { ?>
                                            
                    <div class="alert alert-success alert-dismissible">
                        <p><?php echo $Msg; ?> </p>
                    </div>;

            <?php }
            ?>
    <form role="form" class="wowload fadeInRight" method="post" action="book.php">
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Ticket ID" name="ticket" required="">
        </div>        
        <div class="form-group">
            <div class="row">
            <div class="col-xs-6">
            <select class="form-control" name="qty" required="">
              <option value="empty" >No. of Seats</option>
              <?php 
                for ($i=1; $i < 11; $i++) { 
                    echo "<option value='$i''>$i</option>";
                 } ?>
            </select>
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
            <div class="row">
            <div class="col-xs-4">
              <select class="form-control col-sm-2" name="day" id="expiry-month" required="">
                <option value="empty">Date</option>
                <?php 
                for ($i=1; $i < 31; $i++) { 
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
        <button class="btn btn-default" type="submit" name="reschedule">Reschedule</button>
    </form>    
</div>
</div>  
</div>
<?php include 'footer.php'; ?>