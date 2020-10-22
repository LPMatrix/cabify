<?php session_start();
include 'header.php'; 
include '../config.php';?>
	
	<div class="container">
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  	<th> Date </th>
                  	<th> Reserved Seat </th>
					<th> Bus Type </th>
					<th> Destination </th>
					<th> Transaction Code </th>
					<th> Action </th>
                </thead>
                <tbody>
		<?php
							include('../config.php');
							$result = mysqli_query($con,"SELECT * FROM reserve");
							while($row = mysqli_fetch_array($result))
								{ $num = $row['transactionnum']; ?>
									<tr>
									<td><?php echo $row['date']; ?></td>
									<td><?php echo $row['seat_reserve']; ?></td>
								    <?php   $rrad=$row['bus'];
								    		$id=$row['id'];
									$results = mysqli_query($con,"SELECT * FROM route WHERE id='$rrad'");
									while($rows = mysqli_fetch_array($results))
										{ ?>
									<td><?php echo $rows['type']; ?></div></td>
								
									<td><?php echo $rows['route']; ?></div></td>
										<?php } ?>
									<td><?php echo $row['transactionnum']; ?></td>
								<td><a href="del.php?del=3&id=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a>
									</tr>
								<?php }
							?> 
                
                </tbody>
                <tfoot>
                <tr>
                  <th> Date </th>
                  <th> Reserved Seat </th>
					<th> Bus Type </th>
					<th> Destination </th>
					<th> Transaction Code </th>
					<th> Action </th>
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