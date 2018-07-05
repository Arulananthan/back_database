<?php
error_reporting(0);
    $t_name = $_POST["dtname"];
    $d_name = $_POST["ddbname"];

  foreach($d_name as $backup){

						// Get connection object and set the charset
						$conn = mysqli_connect("localhost", "root", "", $backup);
						$conn->set_charset("utf8");

						// Get All Table Names From the Database
						$tables = array();
						$sql = "SHOW TABLES";
						$result = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_row($result)) {
							$tables[] = $row[0];
						}

						$sqlScript = "";
						foreach ($tables as $table) {

							// Prepare SQLscript for creating table structure
							$query = "SHOW CREATE TABLE $table";
							$result = mysqli_query($conn, $query);
							$row = mysqli_fetch_row($result);

							$sqlScript .= "\n\n" . $row[1] . ";\n\n";
							$query = "SELECT * FROM $table";
							$result = mysqli_query($conn, $query);
							$columnCount = mysqli_num_fields($result);
							// Prepare SQLscript for dumping data for each table
							for ($i = 0; $i < $columnCount; $i ++) {
								while ($row = mysqli_fetch_row($result)) {
									$sqlScript .= "INSERT INTO $table VALUES(";
									for ($j = 0; $j < $columnCount; $j ++) {
										$row[$j] = $row[$j];

										if (isset($row[$j])) {
											$sqlScript .= '"' . $row[$j] . '"';
										} else {
											$sqlScript .= '""';
										}
										if ($j < ($columnCount - 1)) {
											$sqlScript .= ',';
										}
									}
									$sqlScript .= ");\n";
								}
							}

							$sqlScript .= "\n";
						}

						if(!empty($sqlScript))
						{
							// Save the SQL script to a backup file
							$backup_file_name = $backup . '_backup_' . date('Y-m-d') . '.sql';
							//$fileHandler = fopen($backup_file_name, 'w+');
						  $fileHandler = fopen($_SERVER["DOCUMENT_ROOT"].'/database/mapme/db_backup/'.$backup_file_name, 'w+');
							$number_of_lines = fwrite($fileHandler, $sqlScript);
							fclose($fileHandler);

							// Download the SQL backup file to the browser
							header('Content-Description: File Transfer');
							header('Content-Type: application/octet-stream');
							header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
							header('Content-Transfer-Encoding: binary');
							header('Expires: 0');
							header('Cache-Control: must-revalidate');
							header('Pragma: public');
							header('Content-Length: ' . filesize($backup_file_name));
							ob_clean();
							flush();
							readfile($backup_file_name);
							exec('rm ' . $backup_file_name);

							//mail config
						$url = 'https://api.elasticemail.com/v2/email/send';
						//$filename = "helloWorld.txt";
						$file_name_with_full_path = realpath($_SERVER["DOCUMENT_ROOT"].'/database/mapme/db_backup/'.$backup_file_name);
						$filetype = "application/octet-stream"; // Change correspondingly to the file type

									try{
									$post = array('from'=> 'from mail',
									'fromName' => 'Yourname',
									'apikey' => 'Your APIkey',
									'subject' => 'backuop database',
									'to' => 'TO mail',
									'bodyHtml' => 'database backup files',
									'bodyText' => '',
									'isTransactional' => false,
									'file_1' => new CurlFile($file_name_with_full_path, $filetype, $backup_file_name));
									//'file_1' => new CurlFile($file_name_with_full_path, $filetype, $backup_file_name));
								print_r($post);
									$ch = curl_init();
									curl_setopt_array($ch, array(
									CURLOPT_URL => $url,
									CURLOPT_POST => true,
									CURLOPT_POSTFIELDS => $post,
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_HEADER => false,
									CURLOPT_SSL_VERIFYPEER => false
									));

									$result=curl_exec ($ch);
									curl_close ($ch);

									echo $result;
									}
									catch(Exception $ex){
									echo $ex->getMessage();
									}
						}
 }



 // copy table structure only

    foreach($t_name as $table){
		 foreach($d_name as $database){
		$conn = mysqli_connect("localhost","root","",$database);
		 }
		$log = mysqli_query($conn,"SHOW TABLES LIKE '$table'");
		while($fet_log = mysqli_fetch_array($log)){
			 $table_name = $fet_log[0];
		}
		 $table_exp = explode(',',$table_name);
			 $table_ex = explode(',',$table);
			//print_r($table_ex);
		if($table_ex == $table_exp){

			echo "two table is equal..";
			 $table_imm = implode(',',$table_ex);

			echo "SELECT query FROM db_log WHERE function !='CREATE' AND table_name IN('$table_imm') ORDER by id ASC";
			$con = mysqli_connect("localhost","root","","test");
			//$logs = mysqli_query($con,"SELECT query FROM db_log WHERE table_name IN('$table_imm') AND status ='1' ORDER by id ASC");
			$logs = mysqli_query($con,"SELECT query FROM db_log WHERE function !='CREATE' AND table_name IN('$table_imm') ORDER by id ASC");
			print_r($con);
			while($fet_logs = mysqli_fetch_array($logs)){
				print_r($fet_logs);
			$t_stru[] = $fet_logs['query'];
			}

		}
		else{
			echo "Table update successful...";

			$conn = mysqli_connect("localhost","root","","test");
			$query = "show create table $table";
			$sql = mysqli_query($conn,$query);
			while($fet_sql = mysqli_fetch_array($sql)){
				$t_stru[] = $fet_sql[1];
			}
		}
    }
   foreach($d_name as $data){
	    $conn = mysqli_connect("localhost","root","",$data);
        foreach($t_stru as $query){
          $structure[] = $query;
			$res[] = mysqli_query($conn,$query);
		}

   }
?>
