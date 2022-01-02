
    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Edit Lowongan</small></h5>
    
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
            <?php
           

            $getID = $_GET['id'];
            $sql = "SELECT *FROM joblist a
                        LEFT JOIN bidang b ON (a.id_bidang=b.id_bidang) 
                        LEFT JOIN perusahaan c ON (a.id_perusahaan = c.id_perusahaan)
                    WHERE a.id_job= '$getID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

            $status = $data['status_job'];
                    if ($status === '0') {
                        $status = '<span class="label label-default">Available</span>';
                    } elseif ($status === '1') {
                        $status = '<span class="label label-primary">Closed</span>';
                    }
            


            $sql = "SELECT * FROM bidang";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $bidang .= "<option value='{$row['id_bidang']}'> {$row['bidang']} </option>";
            }

            
                ?>
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=job.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_job" value="<?php echo $getID; ?>">
                    <input type="hidden" name="id_perusahaan" value="<?php echo $data['id_perusahaan']; ?>">
                    <div class="form-group">
                    	<label>Bidang Pekerjaan</label>
                    	<select class="form-control" name="id_bidang">
                    	<?php
                    		$sql = "SELECT * FROM bidang";
            				$res = $conn->query($sql);
            				while ($row = $res->fetch_assoc()) { ?>
            				<option value="<?php echo $row['id_bidang']; ?>"> <?php echo $row['bidang']; ?> </option>";
           				<?php } ?>

                  		</select>
    				</div>

    				
                    <div class="form-group">
                    <label> Posisi</label>
                        <input type="text" class="form-control" name="posisi" value="<?php echo $data['posisi']; ?>" required/>
                    </div>

                    <div class="form-group">
                    <label>Tipe Pekerjaan</label>
                        <select class="form-control" name="tipe" required>
                            <option value="<?php echo $data['tipe']; ?>" selected><?php echo $data['tipe']; ?></option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                            <label>Gaji Minimum</label>    
                             <input type="text" class="form-control" name="gaji_min" value="<?php echo $data['gaji_min'];?>" /> 
                                
                            </div>

                            <div class="col-md-6">
                            <label>Gaji Maksimum</label>
                             <input type="text" class="form-control" name="gaji_max" value="<?php echo $data['gaji_max'];?>"/>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label>Syarat</label>
                        <input type="text" class="form-control" name="syarat" value="<?php echo $data['syarat'];?>"required/>
                    </div>

                    <div class="form-group">
                        <label> Tanggal Akhir Lowongan</label>
                        <input type="date" name="tgl_akhir" id="" class="form-control" value="<?php echo $data['tgl_akhir'];?>"required/>
                    </div>
                    
                    <div class="form-group">
                    <label> Deskripsi Lowongan</label>
                        <textarea id="editor" name="desk_job" value="<?php echo $data['desk_job'];?>"><?php echo $data['desk_job'];?></textarea>
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                        <select class="form-control" name="status_job" required>
                            <option value="<?php echo $data['status_job']; ?>" selected><?php echo $status; ?></option>
                            <option value="0">Available</option>
                            <option value="1">Closed</option>
                        </select>
                    </div>
                    <div class="form-group">
   
                    <label></label>
                        <a class="btn btn-default" href="?p=perusahaan.listjob">Batal</a>
                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
