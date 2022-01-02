
    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Pasang Lowongan</small></h5>
    
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
            <?php
           

            $getID = $_SESSION['id_user'];
            $sql = "SELECT *FROM joblist a
                        LEFT JOIN perusahaan b ON (a.id_user=b.id_user) 
                    WHERE b.id_user= '$getID'";
            $res = $conn->query($sql);
            foreach ($res as $row => $data);

            $sql = "SELECT*FROM perusahaan WHERE id_user='$getID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            $id_perusahaan = $data['id_perusahaan'];
            


            $sql = "SELECT * FROM bidang";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $bidang .= "<option value='{$row['id_bidang']}'> {$row['bidang']} </option>";
            }

            
                ?>
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=job.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_perusahaan" value="<?php echo $id_perusahaan; ?>">
                    
                    <div class="form-group">
                    <label>Bidang Pekerjaan</label>
                        <select class="form-control" name="id_bidang" required/>
                            <option value="">- Pilih -</option>
                            <?php echo $bidang; ?>
                        </select>
                    </div>
    
                    <div class="form-group">
                    <label> Posisi</label>
                        <input type="text" class="form-control" name="posisi" required/>
                    </div>
                    <div class="form-group">
                    <label>Tipe Pekerjaan</label>
                        <select class="form-control" name="tipe" required>
                            <option value="">- Pilih -</option>
                            <option value="full time">Full Time</option>
                            <option value="part time">Part Time</option>
                            <option value="tetap">Tetap</option>
                            <option value="kontrak">Kontrak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                           <div class="col-md-6">
                            <label>Gaji Minimum</label>    
                             <input type="text" class="form-control" name="gaji_min"/> 
                                
                            </div>

                            <div class="col-md-6">
                            <label>Gaji Maksimum</label>
                             <input type="text" class="form-control" name="gaji_max"/>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label>Syarat</label>
                        <input type="text" class="form-control" name="syarat" required/>
                    </div>

                    <div class="form-group">
                        <label> Tanggal Akhir Lowongan</label>
                        <input type="date" name="tgl_akhir" id="" class="form-control" required/>
                    </div>
                    
                    <div class="form-group">
                    <label> Deskripsi Lowongan</label>
                        <textarea id="editor" name="desk_job"></textarea>
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="status_job" value="0">
                    <label></label>
                        <a class="btn btn-default" href="?p=perusahaan.listjob">Batal</a>
                        <input type="submit" name="save" value="Publish" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
