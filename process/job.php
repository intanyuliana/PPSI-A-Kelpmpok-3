<div class="col-md-8">
	<div class="panel panel-default">
    	<div class="panel-body">
	    <?php
	    	$getID = $_GET['id'];
	        $sql = "SELECT *FROM joblist a
                        LEFT JOIN bidang b ON 
                        (a.id_bidang =b.id_bidang)
                        LEFT JOIN perusahaan c ON 
                        (a.id_perusahaan=c.id_perusahaan)
                        -- LEFT JOIN tb_jenis_pekerjaan d ON
                        -- (a.id_jenis=d.id_jenis)
                        -- LEFT JOIN tb_perusahaan e ON 
                        -- (a.user_id=e.user_id)
                    WHERE a.id_job = '$getID' ";
	        $res = $conn->query($sql);
	        foreach ($res as $row => $data) {
	    ?>

		    <h5 class="title-entry">
                <?php echo $data['posisi']; ?>
            </h5>
			<!-- <img class="img-responsive" src="dist/images/img/<?php echo $data['img']; ?>" alt="" sizes="{max-width: 750px} 100vw, 750px" width="750"> -->
				<p><span class="fa fa-calendar fa-fw"></span> <?php echo date_format(date_create($data['tgl_posting']), 'd/m/Y').'  <span class="glyphicon glyphicon-user"></span> '.$data['nama']; ?></p>
				<hr>
			<h5 class="title-entry"> Posisi</h5>
				<?php echo $data['posisi']; ?>
                <hr>
            <h5 class="title-entry"> Deskripsi</h5>
				<?php echo $data['deskripsi']; ?>
                <hr>
			<h5 class="title-entry"> Syarat</h5>
				<?php echo $data['syarat']; ?>
                <hr>
            <h5 class="title-entry"> Deadline</h5>
				<?php echo date_format(date_create($data['tgl_akhir']), 'd/m/Y'); ?>
                <hr>
        </div>
	</div>

	<div class="panel panel-default">
    	<div class="panel-body">

    	<h5 class="title-entry"> Info Perusahaan</h5>
    	<!-- <br> -->
			<!-- <img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 397px} 100vw, 397px" width="397"> -->
		<!-- <hr> -->
		<h5 class="title-entry"><?php echo $data['nama'].' </h5>
			<p>NPWP Perusahaan &emsp;:&nbsp'.$data['npwp'].'</p>
			<p>Alamat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:'.$data['alamat'].'</p>
			<p>No Telepon &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:'.$data['telp']
			;?>
        <hr>
	<?php
		$tgl_akhir = $data['tgl_akhir'];
		$tgl_skr = date("Y-m-d");
		
		if ($tgl_skr >= $tgl_akhir)
		{
			echo '<div class="alert alert-danger">This job is expired</div>';	
		} else {
			echo '<a href="?p=apply&id='.$data["id_job"].'" class="btn btn-primary btn-md" >Apply for this Job</a>';
		}
	}
	?>

		</div>
	</div>

</div>