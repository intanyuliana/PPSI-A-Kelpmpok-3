<div class="col-md-8">
	<div class="panel panel-default">
    	<div class="panel-body">
	    <?php
	    	$getID = $_GET['id'];
	        $sql = "SELECT *FROM joblist a
                        LEFT JOIN perusahaan b ON 
                        (a.id_perusahaan=b.id_perusahaan)
                        LEFT JOIN bidang c ON 
                        (a.id_bidang=c.id_bidang)
                        LEFT JOIN jenis_industri d ON
                        (b.id_jenis=d.id_jenis)
                        LEFT JOIN user e ON 
                        (b.id_user=e.id_user)
                    WHERE a.id_job = '$getID' ";
	        $res = $conn->query($sql);
	        foreach ($res as $row => $data) {
	    ?>

		    
			<img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 150px} 100vw, 150px" width="150" style="float:left; margin-right:20px" >
			<h2 class=""><?php echo $data['posisi']; ?></h2>
				<p><?php echo $data['bidang']; ?> - <?php echo $data['jenis']; ?></p>
				<p style="float:right;margin-right: 150px"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;<?php echo $data['gaji_min'];?> - <?php echo $data['gaji_max'];?></p>
				<p><span class="glyphicon glyphicon-map-marker">&nbsp;</span><?php echo $data['alamat']; ?></p>
				<p style="float:right;margin-right:200px ;"><span class="glyphicon glyphicon-time">&nbsp;<?php echo $data['tipe']; ?></span></p>
				<p><span class="fa fa-calendar fa-fw"></span> <?php echo date_format(date_create($data['tgl_posting']), 'd/m/Y').' - '.date_format(date_create($data['tgl_akhir']), 'd/m/Y'); ?></p>
				
				<p><span class="glyphicon glyphicon-user">&nbsp;</span><?php echo $data['nama']; ?></p>
				<br>
				<?php
					$tgl_akhir = $data['tgl_akhir'];
					$tgl_skr = date("Y-m-d");
				
				?>
			<h5 class="title-entry"> Posisi</h5>
				<?php echo $data['posisi']; ?>
                <hr>
            <h5 class="title-entry"> Deskripsi & Kualifikasi </h5>
				<?php echo $data['desk_job']; ?>
              	<hr>
			<a href="?p=admin.list_job" class="btn btn-default btn-md">Kembali</a><?php } ?>
        </div>
	</div>

	

</div>