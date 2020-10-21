<?php
include('config.php');
$id=$_GET['id'];
$qty=$_GET['qty'];
$result = mysqli_query($con,"SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysqli_fetch_array($result))
  {
    $transactionum=$row['transactionum'];
    $name=$row['name'];
    $contact=$row['contact'];
    $payable=$row['payable'];
    // $origin=$row['origin'];
  }
//   $res = mysqli_query($con,"SELECT * FROM pickup WHERE id='$origin'");
// while($rowb = mysqli_fetch_array($res))
//   {
//     $origin=$rowb['name'];
//   }
$results = mysqli_query($con,"SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysqli_fetch_array($results))
  {
    $ggagaga=$rows['bus'];
    $resulta = mysqli_query($con,"SELECT * FROM route WHERE id='$ggagaga'");
    while($rowa = mysqli_fetch_array($resulta))
      {
      $route=$rowa['route'];
      $type=$rowa['type'];
      $time=$rowa['time'];
      }
    $time=$time;
    $qty=$qty;
    $date=$rows['date'];
    
  }
  //https://paystack.com/pay/qn32KeDUcp   post-office
  //https://paystack.com/pay/29E8df6qsp     fate
?>



<?php include 'header.php'; ?>
<div class="container spacer">
      <!-- <h4 class="lead text-center">Your ticket details has been sent to your mail</h4> -->
      <h4 class="lead text-center">Print and present this ticket upon boarding the bus</h4>
	<div class="col-sm-4 col-sm-offset-4" style="margin-top: 10px">

	          <div class="box box-primary direct-chat" style="">
            <!-- /.box-header -->
            <div class="box-body" id="print_content">
            <div class="box-header with-border">
              <h3 class="box-title">Cabify</h3>

              <div class="box-tools pull-right">
                <img src="images/logo2.png">
              </div>
            </div>

              <div class="direct-chat-messages">
              <form method="post" action="">
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Ticket Number</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $transactionum; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Name</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $name; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Phone Number</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $contact; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Date and Time</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $date.', '.$time; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Origin to Destination</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $route; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Type</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $type; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Number of seat</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $qty; ?></span>
                  </div>

                </div>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Payable</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $payable; ?></span>
                  </div>

                </div>
  
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="input-group">
                  <button onclick="Clickheretoprint()" type="submit" name="" class="btn btn-default btn-flat">Print as PDF</button>
                </div>
            </div>
            <!-- /.box-footer-->
            </form>
          </div>
      </div>
</div>
<?php include 'footer.php'; ?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Easy Ride</title>');
   docprint.document.write('<link rel="stylesheet" href="css/ride.min.css" type="text/css"/>');
   docprint.document.write('<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />');
   docprint.document.write('<link rel="stylesheet" href="assets/style.css">'); 
   docprint.document.write('</head><body onLoad="self.print()">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>