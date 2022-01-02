<?php
	if (isset($_POST['save'])) 
	{
		$jenis = $_POST['jenis'];
		
		$sql = "INSERT INTO jenis_industri (jenis)VALUES ('$jenis') ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Data berhasil disimpan!"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=jenis.list">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}


	if (isset($_POST['update'])) 
	{
		$getId		= $_REQUEST['id'];
		$jenis = $_POST['jenis'];
		
		$sql = "UPDATE jenis_industri 
					SET jenis = '$jenis'
					where id_jenis = $getId ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Data berhasil disimpan!"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=jenis.list">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}