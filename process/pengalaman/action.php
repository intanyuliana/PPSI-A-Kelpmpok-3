<?php
if (isset($_POST['save'])) 
{
	
    $id_user            = $_POST['id_user'];
    $id_pelamar         = $_POST['id_pelamar'];
	$desk_pengalaman    = $_POST['desk_pengalaman'];
    $tahun              = $_POST['tahun'];
    
	$allowExt 			= array( 'doc', 'docx', 'pdf' );

	$fileName 			= $_FILES['sertifikat']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['sertifikat']['size'];
	$fileTemp			= $_FILES['sertifikat']['tmp_name'];

	$upload_dir 		= "dist/file/sertifikat/";
	$file 				= basename ($fileName);
    $v_file 			= str_replace(' ','_',$file);
 


	if ( in_array( $fileExt, $allowExt ) === TRUE ) 
	{
		
		if ( $fileSize < 5242880 ) 
		{
				
			if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file ) )
			{
				$sql = "INSERT INTO pengalaman (id_pelamar,tahun,sertifikat,desk_pengalaman) 
						VALUES ($id_pelamar,'$tahun','$v_file','$desk_pengalaman')";
                
				if ( $conn->query($sql) === TRUE ) 
				{
					echo '<script>alert("Data Berhasil Ditambahkan!"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.list">';
					 			
				} 
				else 
				{
					echo '<script>alert("Data Gagal Ditambahkan!"); </script>';
					// echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.add">';
				}
			} 
			else 
			{
				echo '<script>alert("File Gagal di Upload!"); </script>';
			    echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.add">';
			}		
        } 
        else 
        {
			echo '<script>alert("Ukuran File Maksimal 5 MB"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.add">';
		}	 
    }  
    else 
    {
		echo '<script>alert("Ekstensi File Tidak Diizinkan!"); </script>';
		echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.add">';
	}
	$conn->close();
}
else if ( isset($_POST['edit']) )
{
    $id                 = $_POST['id'];
    $id_pelamar         = $_POST['id_pelamar'];
	$desk_pengalaman    = $_POST['desk_pengalaman'];
    $tahun              = $_POST['tahun'];
    
	$allowExt 			= array( 'doc', 'docx', 'pdf' );

	$fileName 			= $_FILES['sertifikat']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['sertifikat']['size'];
	$fileTemp			= $_FILES['sertifikat']['tmp_name'];

	$upload_dir 		= "dist/file/sertifikat/";
	$file 				= basename ($fileName);
    $v_file 			= str_replace(' ','_',$file);

    if($_FILES['sertifikat']['size'] > 0)
	{
        if ( $fileSize < 5242880 ) 
		{
            if ( in_array( $fileExt, $allowExt ) === TRUE ) 
	        {
                if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file ) )
			    {
                    $sql = "UPDATE pengalaman SET
                            tahun       = '$tahun',
                            sertifikat  = '$v_file',
                            desk_pengalaman = '$desk_pengalaman'
                        WHERE id = $id"; 
	
				    if ( $conn->query($sql) === TRUE ) 
				    {
					    echo '<script>alert("Data Berhasil Diupdate!"); </script>';
					    echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.list">'; 			
				    } 
				    else 
				    {
					    echo '<script>alert("Data Gagal Diupdate!"); </script>';
					    // echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.edit">';
				    }
                }
                else 
                {
                    echo '<script>alert("File Gagal Diupload!"); </script>';
			        echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.edit">';
                }
            }
            else
            {
                echo '<script>alert("Ekstensi File Tidak Diizinkan!"); </script>';
			    echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.edit">';
            }
        }
        else
        {
            echo '<script>alert("Ukuran File Maksimal 5 MB!"); </script>';
            echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.edit">';
        }
	
    }
    else
    {
        $sql = "UPDATE pengalaman SET
                    tahun           = '$tahun',
                    desk_pengalaman = '$desk_pengalaman'
                WHERE id = $id"; 
    
        if ( $conn->query($sql) === TRUE ) 
        {
            echo '<script>alert("Data Berhasil Diupdate!"); </script>';
            echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.list">'; 			
        } 
        else 
        {
            echo '<script>alert("Data Gagal Diupdate!"); </script>';
            // echo '<meta http-equiv="refresh" content="0;URL=?p=pengalaman.edit">';
        }
	}
}
?>
				

						
				
