<?php
	
	//Connect to mysql server
	require "config.php";
	$phone=@$_GET['con'];

?>

<?php include 'header.php';?>
<div class="container">

 <div class="col-sm-12 spacer">

 <?php 
 	if (@$_GET['ed']==1) {
 		echo '<div class="alert alert-dismissible alert-success"><p>You have successfully rescheduled your reservation</p></div>';
 	}
 	elseif (@$_GET['ed']==2) {
 		echo '<div class="alert alert-dismissible alert-danger"><p>Sorry, an error occured</p></div>';
 	}
  ?>
 		          <div class="box box-primary direct-chat" style="">
            <!-- /.box-header -->
            <div class="box-body" id="print_content">
            <div class="box-header with-border">
            <h3 class="box-title">Tickets booked by </h3>
            <div class="box-tools pull-right">
                </h3><?php echo $phone; ?></div></h3>
              </div>
            </div>
            <div class="direct-chat-messages">
            <div class="direct-chat-msg">
            <?php 
            	$result = mysqli_query($con,"SELECT * FROM customer WHERE contact = '$phone'") or die(mysqli_error($con));
            	  while($row = mysqli_fetch_array($result))
				  { ?>
						
                <div class="direct-chat-info clearfix">
                  <div class="col-sm-2"><span class="direct-chat-name pull-left"><?php echo $row['transactionum']; ?></span></div>
                  <div class="col-sm-2"><span class="direct-chat-name pull-left"><?php echo $row['seat']; ?> seats</span></div>  
                  <?php 
                  		$dest=$row['bus'];
                  		$result2 = mysqli_query($con,"SELECT * FROM route WHERE id = '$dest'") or die(mysqli_error($con));
            	        while($row2 = mysqli_fetch_array($result2)){ ?>
            	        <div class="col-sm-2"><span class="direct-chat-name pull-left"><?php echo $row2['route']; ?></span></div>
                  <?php } ?>
                  <?php 
                  		$id=$row['transactionum'];
                  		$result3 = mysqli_query($con,"SELECT * FROM reserve WHERE transactionnum = '$id'") or die(mysqli_error($con));
            	        while($row3 = mysqli_fetch_array($result3)){ $id=$row3['id']; ?>
            	        <div class="col-sm-2"><span class="direct-chat-name pull-left"><?php echo $row3['date']; ?></span></div>

            	        <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Reschedule Ticket</h4>
      </div>
      <div class="modal-body" ></br>
          <form role="form" class="wowload fadeInRight" method="post" action="book.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <div class="form-group">
                <input type="date" class="form-control" name="date" required="" value="<?php echo $row3['date']; ?>">
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="edit">Save</button>
      </div>
        </form>    
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                  <?php } ?>
                  <div class="col-sm-2"><span class="direct-chat-timestamp pull-right"><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?php echo $id; ?>">Reschedule</button></span></div>
                  </div>

                <?php }
					?> 
                </div>
            </div>

				
             
              
                
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
          </div>
</div>




</div>
<?php include 'footer.php';?>