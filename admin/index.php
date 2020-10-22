<?php 
session_start();
include 'session.php';
include 'header.php';
include '../config.php';

?>
	<div class="container">
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Route</th>
                  <th>Bus Type</th>
                  <th>Time</th>
                  <th>Payable</th>
                  <th>Transaction Code</th>
                  <th>Status</th>  
                  <th>Action</th>
                </thead>
                <tbody>
<?php 
	$s="SELECT * FROM customer";
	$result=mysqli_query($con,$s);
	$r=mysqli_num_rows($result);

	while($data=mysqli_fetch_array($result))
	{ 
    $rrad=$data['bus'];
    $dddd=$data['transactionum']; 

    $results = mysqli_query($con,"SELECT * FROM route WHERE id='$rrad'");

    $resulta = mysqli_query($con,"SELECT * FROM reserve WHERE transactionnum='$dddd'");
    ?>
			          <tr>
                  <?php   
                        $id=$data['transactionum']; 
                        $editid=$data['id'];
                   ?>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['contact']; ?></td>

  <?php      
      while($row=mysqli_fetch_array($results))
      { ?>
                  <td><?php echo $row['route']; ?></td>
                  <td><?php echo $row['type']; ?></td>
                  <td><?php echo $row['time']; ?></td>
       <?php   } ?>

                  <td><?php echo $data['payable']; ?></td>
                  <td><?php echo $data['transactionum']; ?></td>
                  <td><?php echo $data['status']; ?></td>

            <td><a href="del.php?del=1&id=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a>
            <a href=""><button class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $editid; ?>">Status</button></a></td>

            <div class="modal fade" id="edit<?php echo $editid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body"></br>
                    <form class="wowload fadeInRight" method="post" action="edit.php?edit=2">  
                      <div class="form-group">             
                          <select class="form-control" name="status">
                            <option value="Onboard">Onboard</option>
                            <option value="Not Onboard">Not Onboard</option>
                          </select>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $editid ?>">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="">Save</button>
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
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Route</th>
                  <th>Bus Type</th>
                  <th>Time</th>
                  <th>Payable</th>
                  <th>Transaction Code</th>
                  <th>Status</th>                  
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
