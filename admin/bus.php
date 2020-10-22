<?php session_start();
include 'header.php';
include '../config.php'; ?>
	
	<div class="container">
		<button class="btn btn-info" data-toggle="modal" data-target="#add">Add Bus and Place</button>
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Bus Type</th>
                  <th>Destination</th>
                  <th>Seats Available</th>
                  <th>Price</th>
                  <th>Time</th>
                  <th>Action</th>
                </thead>
                <tbody>
			<?php
							include('../config.php');
							$result = mysqli_query($con, "SELECT * FROM route");
							while($row = mysqli_fetch_array($result))
								{ 	$id=$row['id'];
									?>
									<tr>
									<td><?php echo $row['type']?></td>
									<td><?php echo $row['route']; ?></div></td>
									<td><?php echo $row['numseats']; ?></div></td>
									<td><?php echo $row['price']; ?></div></td>
									<td><?php echo $row['time']; ?></div></td>
							    <td><a href="del.php?del=2&id=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a>
                  <a href=""><button class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $id; ?>">Edit</button></a></td>

  <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Bus Information</h4>
      </div>
      <div class="modal-body" ></br>
          <form role="form" class="wowload fadeInRight" method="post" action="edit.php?edit=1">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Bus Type" name="type" required="" value="<?php echo $row['type']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Destination" name="route" required="" value="<?php echo $row['route']; ?>">
            </div>        
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Seats Available" name="seat" required="" value="<?php echo $row['numseats']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Price" name="price" required="" value="<?php echo $row['price']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Time" name="time" required="" value="<?php echo $row['time']; ?>">
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Save</button>
      </div>
        </form>    
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

									</tr>

								<?php }
						?> 
              

                </tbody>
                <tfoot>
                <tr>
                  <th>Bus Type</th>
                  <th>Destination</th>
                  <th>Seats Available</th>
                  <th>Price</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>

	</div>
<?php include 'footer.php'; ?>

<script src="../datatables/jquery.dataTables.min.js"></script>
<script src="../datatables/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
    	"ordering": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" ></br>
          <form role="form" class="wowload fadeInRight" method="post" action="add.php">
		        <div class="form-group">
		            <input type="text" class="form-control"  placeholder="Bus Type" name="type" required="">
		        </div>
		        <div class="form-group">
		            <input type="text" class="form-control"  placeholder="Destination" name="route" required="" >
		        </div>        
		        <div class="form-group">
		            <input type="number" class="form-control"  placeholder="Seats Available" name="seat" required="">
		        </div>
		        <div class="form-group">
		            <input type="number" class="form-control"  placeholder="Price" name="price" required="" >
		        </div>
		        <div class="form-group">
		            <input type="text" class="form-control"  placeholder="Time" name="time" required="">
		        </div>
		        <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button href="" type="submit" class="btn btn-danger">Save</button>
      			</div>
    		</form>    
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  