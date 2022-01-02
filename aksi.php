<?php 

	require('./connect.php');
if ( isset($_POST['save']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['logo']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['logo']['size'];
		$fileTemp 			= $_FILES['logo']['tmp_name'];

		$upload_dir 		= "dist/images/logo/";
		$logo 				= basename ($fileName);
		$v_logo 			= str_replace(' ','_',$logo);

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{

					if ( move_uploaded_file( $fileTemp,$upload_dir.$v_logo) ) 
					{
						$sql = "INSERT INTO upload ( logo ) VALUES ( '$v_logo')";

						if ( $conn->query($sql) === TRUE ) {
							// echo "berhasil simpan";
							echo '<script>alert("data berhasil disimpan"); </script>';
						} else {
							echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
						}
					} else {
						echo '<script>alert("gagal upload file"); </script>';
					}
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
		
		
	}