<?php

    $tname  = $_REQUEST['tname'];
    $fname  = $_REQUEST['fname'];
    $query  = $_REQUEST['query'];
    $dbname = $_REQUEST['dbname'];
  	$word   = "CREATE";
  	$add    = "ADD";
	  $drop   = "DROP";
  	$modify = "MODIFY";
  	$delete = "DELETE";
  	$insert = "INSERT";

    $conn = mysqli_connect('localhost','root','',$dbname);
			if($conn ->connect_errno){
				echo "database not connected";
				die($conn ->connect_error);
			}
			else{
				//echo "database connected...";
			}
  $sql = explode(';',$query);
	$arr_filter =array_filter($sql);

    foreach($arr_filter as $key => $value){

        		   if (strpos($value, $word) !== FALSE) {
        				$create = mysqli_query($conn,$value);
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$word', '$value', 'arul', '$dbname','0')");
        			}
        			else if (strpos($value, $add) !== FALSE) {
        				$create = mysqli_query($conn,$value);
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$add', '$value', 'arul', '$dbname','0')");
        			}
        			 else if (strpos($value, $drop) !== FALSE) {
        				 ?>
        				<script>confirm("Do you really want to execute DROP record?");</script>

        <?php
        				$create = mysqli_query($conn,$value);
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$drop', '$value', 'arul', '$dbname','0')");
        			}
        			else if (strpos($value, $modify) !== FALSE) {

        				$create = mysqli_query($conn,$value);
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$modify', '$value', 'arul', '$dbname','0')");
        			}
        			else if (strpos($value, $delete) !== FALSE) {
        				 ?>
        				<script>confirm("Do you really want to execute delete record?");</script>
        				<?php
        				$create = mysqli_query($conn,$value);
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$delete', '$value', 'arul', '$dbname','0')");
        			}
        			else if (strpos($value, $insert) !== FALSE) {
        				$create = mysqli_query($conn,$value);
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$insert', '$value', 'arul', '$dbname','0')");
        			}
        			else{
        				$log = mysqli_query($conn,"INSERT INTO `db_log` (`table_name`, `function`, `query`, `creater_name`, `db_name`, `status`) VALUES ('$tname', '$fname', '$value', 'arul', '$dbname','0')");
        			}
  	}

?>
	<form id="table" name="table" action="" method="post">
      	<select name="d_tname[]" id="d_tname" style="width: 345px;height: 107px;" multiple>
      		<?php
          		$conn = mysqli_connect('localhost','root','','test');
          		$databases = mysqli_query($conn,"show tables");
          		while($fet_databases = mysqli_fetch_array($databases)){?>
          			<option value="<?php echo $fet_databases['Tables_in_test']; ?>"><?php echo $fet_databases['Tables_in_test']; ?></option>
          		<?php }?>
      	</select>
        <br>
        <br>
      	<button type="button" name="tabletodb" id="tabletodb" >Excute</button>
      	<div id="message"></div>
	</form>
