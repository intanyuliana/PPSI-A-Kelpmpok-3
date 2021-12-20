<div class="col-md-8">
	<div class="panel panel-default">
    	<div class="panel-body">
	    <?php
			 include 'rupiah.php';
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

		    <div class="row">
				<div class="col-lg-3">
					<img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 150px} 100vw, 150px" width="150" style="float:left; margin-right:20px" >
				</div>

				<div class="col-lg-9">
					<h2 class=""><?php echo $data['posisi']; ?></h2>
					<p><?php echo $data['bidang']; ?> - <?php echo $data['jenis']; ?></p>

					<div class="row">
						<div class="col-lg-6">
							<p><i class="fa fa-building"></i>&nbsp;<?php echo $data['nama']; ?></p>
							<p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $data['kota']; ?></p>
							<p><span class="fa fa-calendar fa-fw"></span> <?php echo date_format(date_create($data['tgl_posting']), 'd/m/Y').' - '.date_format(date_create($data['tgl_akhir']), 'd/m/Y'); ?></p>
						</div>

						<div class="col-lg-6">
							<p><i class="glyphicon glyphicon-credit-card"></i>&nbsp;<?php echo rupiah($data['gaji_min']); ?> - <?php echo rupiah($data['gaji_max']); ?></p>
							<p><i class="fa fa-clock-o"></i>&nbsp;<?php echo $data['tipe']; ?></p>
						</div>
					</div>
				</div>
			</div>
				<hr>
				
			<h5 class="title-entry"> Posisi</h5>
				<?php echo $data['posisi']; ?>
                <hr>
            <h5 class="title-entry"> Deskripsi & Kualifikasi </h5>
				<?php echo $data['desk_job']; ?>
              	<hr>
		
				
					
						<a href="?p=perusahaan.listjob" class="btn btn-primary btn-md">Kembali</a><?php } ?>
						
					
				
        </div>
	</div>

	

</div>