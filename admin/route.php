<?php 
//if(!isset($_SESSION)) {session_start();}
//include 'header.php';
include '../config.php';

?>
	<div class="container">
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Bus Type</th>
                  <th>Route</th>
                  <th>Seat Number</th>
                  <th>Price</th>
                  <th>Time</th>
                  <th>Seat Number</th>
                  <td>Action</td>
                </thead>
                <tbody>
<?php 
	$s="SELECT * FROM route";
	$result=mysqli_query($con,$s);
	$r=mysqli_num_rows($result);

	while($data=mysqli_fetch_array($result))
	{
    ?>
			          <tr>
                  <?php $id = $data['type']; ?>
                  <td><?php echo $data['route']; ?></td>
                  <td><?php echo $data['numseats']; ?></td>
                  <td><?php echo $data['price']; ?></td>
                  <td><?php echo $data['time']; ?></td>


                  <td><a href="del.php?del=1&id=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

			<?php }

 ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <td>Bus Type</td>
                  <td>Route</td>
                  <td>Seat Number</td>
                  <td>Price</td>
                  <td>Time</td>
                  <td>Seat Number</td>
                  <td>Action</td>
                </tr>
                </tfoot>
              </table>

	</div>
<?php //include 'footer.php'; ?>

<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>