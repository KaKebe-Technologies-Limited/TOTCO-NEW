<?php
require_once __DIR__ . './../lib/DataSource.php';


	if(isset($_POST['id'])) {
		$id = trim($_POST['id']);
		$sql = "DELETE FROM tbl_order WHERE id in ($id)";
		if(mysqli_query($conn, $sql)){
			echo $id;
		}
	}
?>