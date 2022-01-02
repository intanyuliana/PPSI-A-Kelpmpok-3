<?php
	if (isset($_POST['update'])) 
	{
		// $getID 			 = $_GET['id'];
		$id_apply 	 = $_POST['id_apply'];
		$pesan 	  	 = $_POST['pesan'];
        $status_pelamar 	  	 = $_POST['status_pelamar'];
       
		$uname 			 = $_POST['uname'];
		$email 			 = $_POST['email'];
		$pass 			 = $_POST['pass'];
		$nama = $_POST['nama'];
		$posisi 		 = $_POST['posisi'];
        
        if($status_pelamar ==='1'){
            $status_apply = 1;
        }else if($status_pelamar ==='2'){
            $status_apply = 2;
        }

		$sql = "UPDATE apply SET 
					pesan = '$pesan',
					status_pelamar  = $status_pelamar,
					status_apply = $status_apply
				WHERE id_apply = $id_apply ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Data lamaran berhasil diproses"); </script>';
             echo '<meta http-equiv="refresh" content="0;URL=?p=recruit.list">';
 			
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		
    }
?>