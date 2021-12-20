<?php
if (isset($_POST['save'])) 
{
	$id_job 	    = $_POST['id_job'];
	$id_pelamar     = $_POST['id_pelamar'];
	$id_perusahaan  = $_POST['id_perusahaan'];
	$status_apply   = $_POST['status_apply'];
	$status_pelamar = $_POST['status_pelamar'];
	$id_user 		= $_SESSION['id_user'];
	$email 			= $_SESSION['email'];
	$pass 			= $_SESSION['pass'];

	$allowExt 			= array( 'doc', 'docx', 'pdf' );
	$allowExt1 			= array( 'doc', 'docx', 'pdf' );

	$fileName 			= $_FILES['file']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['file']['size'];
	$fileTemp 			= $_FILES['file']['tmp_name'];

	$fileName1 			= $_FILES['files']['name'];
	$fileExt1			= strtolower(end(explode('.', $fileName1)));
	$fileSize1			= $_FILES['files']['size'];
	$fileTemp1 			= $_FILES['files']['tmp_name'];

	$upload_dir 		= "dist/file/cv/";
	$file 				= basename ($fileName);
	$v_file 			= str_replace(' ','_',$file);

	$upload_dir1 		= "dist/file/transkrip/";
	$files 				= basename ($fileName1);
	$v_files 			= str_replace(' ','_',$files);

	if ( in_array( $fileExt, $allowExt ) === TRUE ) 
	{
		if ( in_array( $fileExt1, $allowExt1 ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( $fileSize1 < 1044070 ) 
				{
					$sqlcek = "SELECT * FROM apply WHERE id_job = '".$id_job."' AND id_pelamar = '".$id_pelamar."' ";
		    		$result = $conn->query($sqlcek);

				    if ($result->num_rows > 0) {
				        echo '<script>alert("anda sudah mengirim lamaran"); </script>';
				        echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
				    } 
				    else 
				    {

						if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file ) && move_uploaded_file( $fileTemp1,$upload_dir1.$v_files ) )
						{
								$sql = "INSERT INTO apply (id_pelamar,id_job,id_perusahaan, status_apply,status_pelamar, file,files,tgl_apply) 
								VALUES ($id_pelamar,$id_job,$id_perusahaan,$status_apply,$status_pelamar, '$v_file','$v_files',NOW())";

							if ( $conn->query($sql) === TRUE ) 
							{
								echo '<script>alert("Lamaran berhasil dikirim, Thank You!"); </script>';
					 			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
					 			
							} 
							else 
							{
							// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
							echo '<script>alert("data gagal disimpan disimpan"); </script>';
					 		echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
							}
						} 
						else 
						{
							echo '<script>alert("gagal upload file"); </script>';
							echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
						}
					}
				} else {
					echo '<script>alert("ukuran file ijazah maks 1 mb"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
				}
			} else {
				echo '<script>alert("ukuran file cv maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
			}
		} else {
			echo '<script>alert("ekstensi file ijazah harus pdf"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
		}
	} else {
		echo '<script>alert("ekstensi file cv tidak diijinkan"); </script>';
		echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
	}
	$conn->close();
}
				

						
				
