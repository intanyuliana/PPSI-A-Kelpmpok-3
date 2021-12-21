<?php
	$id	 = $_GET['id'];
    
    $sql = "DELETE FROM pengalaman WHERE id = $id";

        if ($conn->query($sql)) 
        {
            echo '<script>alert("Data Berhasil Dihapus!"); </script>';	
            echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.list">';
        }
        else
        {
            echo '<script>alert("Gata Gagal Dihapus!"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.list">';
		}
?>