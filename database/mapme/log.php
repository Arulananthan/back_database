

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>DataTable|TJ Admin</title>
	<link type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
    $('#example1').DataTable();
} );
	</script>
</head>

<body>
<div class="container_12">
<div class="grid_10">
    <div class="box round first grid">
        <h2>Upload Lists  </h2>
        <div class="block">
			<table class="data display datatable" id="example">

				<thead>
					<tr>
					  <th>Table Name</th>
					  <th>Function</th>
					  <th>Uploader Name</th>
					  <th>Upload DB</th>
					  <th>data</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$conn = mysqli_connect('localhost','root','','test');
					$database = mysqli_query($conn,"SELECT * FROM `db_log`");

					while($fet_database = mysqli_fetch_array($database)){
					?>
					<tr >
					  <td align="center"><?php echo $fet_database['table_name']; ?></td>
					  <td align="center"><?php echo $fet_database['function']; ?></td>
					  <td align="center"><?php echo $fet_database['creater_name']; ?></td>
					  <td align="center"><?php echo $fet_database['db_name']; ?></td>
					  <td align="center"><?php echo $fet_database['added_date']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
    </div>
  </div>
</div>
<br>
 <div class="container_12">
<div class="grid_10">
    <div class="box round first grid">
        <h2>USER DATABASE LIST  </h2>
        <div class="block">
			<table class="data display datatable" id="example1">

				<thead>
					<tr>
            <th>FROM Database</th>
					  <th>TO Database</th>
            <th>Table Name</th>
					  <th>Function</th>
					  <th>Uploader Name</th>
					  <th>data</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$conn = mysqli_connect('localhost','root','','test');
					$database = mysqli_query($conn,"SELECT * FROM `db_log`");

					while($fet_database = mysqli_fetch_array($database)){
					?>
					<tr >
					  <td align="center"><?php echo $fet_database['table_name']; ?></td>
            <td align="center"><?php echo $fet_database['table_name']; ?></td>
					  <td align="center"><?php echo $fet_database['function']; ?></td>
					  <td align="center"><?php echo $fet_database['creater_name']; ?></td>
					  <td align="center"><?php echo $fet_database['db_name']; ?></td>
					  <td align="center"><?php echo $fet_database['added_date']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
       </div>
    </div>
  </div>
</div>
</body>
<input type="button" onClick="location.href='database.php'" value='master' class="btn-info">
<input type="button" onClick="location.href='copy.php'" value='copy' class="btn-info">
</html>
