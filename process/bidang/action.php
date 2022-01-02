<?php
	if (isset($_POST['save'])) 
	{
		$bidang = $_POST['bidang'];
		
		$sql = "INSERT INTO bidang (bidang)VALUES ('$bidang') ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Data berhasil disimpan!"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=bidang.list">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}


	if (isset($_POST['update'])) 
	{
		$getId		= $_REQUEST['id'];
		$bidang = $_POST['bidang'];
		
		$sql = "UPDATE bidang 
					SET bidang = '$bidang'
					where id_bidang = $getId ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Data berhasil disimpan!"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=bidang.list">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}