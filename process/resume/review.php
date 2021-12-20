
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>View Resume</small></h3>
        <div class="panel panel-default">
            <div class="panel-heading">Info Resume</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Lowongan</th>
                                <th>Nama Pelamar</th>
                                <th>Nama Perusahaan</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                        <?php
                            $GetID  = $_GET['id'];
                            $sql = "SELECT *FROM apply a 
                                    left join joblist b on a.id_job = b.id_job
                                    left join pelamar c on a.id_pelamar = c.id_pelamar
                                    left join user e on c.id_user = e.id_user
                                    left join perusahaan d on b.id_perusahaan = d.id_perusahaan
                                     WHERE a.id_apply = $GetID";
                            $res = $conn->query($sql);
                            $data = $res->fetch_assoc();

                            $status = $data['status_apply'];
                            if ($status === '0') 
                            {
                                $status = '<span class="label label-default">TERKIRIM</span>';
                            } 
                            else if ($status === '1') 
                            {
                                $status = '<span class="label label-success">DITERIMA</span>';
                            } 
                            elseif ($status === '2') 
                            {
                                $status = '<span class="label label-danger">DITOLAK</span>';
                            }
                        ?>
                            <tr>
                                <td><?php echo $data['posisi']; ?></td>
                                <td><?php echo $data['nama_p'];; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                   
                    <form class="" role="form" action="" id="defaultForm" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:50%;">File CV</th>
                                <th style="width:50%;">Transkrip Nilai/Ijazah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="dist/file/cv/<?php echo $data['file']; ?>">Unduh</a></td>
                                <td><a href="dist/file/ijazah/<?php echo $data['files']; ?>">Unduh</a></td>
                                <input type="hidden" name="id_apply" value="<?php echo $GetID; ?>"><br>`
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan=3>Pengalaman & Sertifikat</th>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <th>Tahun</th>
                                <th>Sertifikat</th>
                            </tr>
                        </thead>
                        <tbody>
               
                        <?php
                            $id = $data['id_pelamar'];              
                            $sql2 = "SELECT *FROM pengalaman a 
                                    left join pelamar b on a.id_pelamar = b.id_pelamar
                                    WHERE a.id_pelamar = $id";                                       
                            $res = $conn->query($sql2);
                            $no  = 0;
                            foreach ($res as $row => $data2) 
                            {
                       ?>
                            <tr>
                                <td><?php echo $data2['desk_pengalaman']; ?></td>
                                <td><?php echo $data2['tahun']; ?></td>
                                <td><a href="dist/file/sertifikat/<?php echo $data2['sertifikat']; ?>">Unduh</a></td>
                            </tr>
                       <?php } ?>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $data['pesan'];?></td>        
                            </tr>
                        </tbody>
                    </table>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:20%;">Status</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>               
                                <td><?php echo $status; ?>         
                            </tr>
                        </tbody>
                    </table>                   
                    <a class="btn btn-default" href="?p=resume.list">Kembali</a>
                    </form>
                </div>
        </div>
    </div>

    <?php
    $id_perusahaan=$data['id_perusahaan'];
    $sql3 = "SELECT *FROM perusahaan a 
                join user b on a.id_user=b.id_user 
                join kota c on a.id_kota=c.id_kota 
                join jenis_industri d on a.id_jenis=d.id_jenis 
                WHERE a.id_perusahaan = $id_perusahaan";         
    $res = $conn->query($sql3);
    $data3 = $res->fetch_assoc();
    ?>

    <div class="col-lg-4">
    <br><br><br><br>
        <div class="panel panel-default">
            <div class="panel-heading">Info Perusahaan</div>
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-lg-4">
                            <center><img src="dist/images/logo/<?php echo $data3['logo'];?>" width="100" height="120"></center>
                        </div>

                        <div class="col-lg-8">
                            <h3><?php echo $data['nama']; ?></h3>
                            
                            <p><i class="fa fa-briefcase"></i>&nbsp;<?php echo $data3['jenis']; ?></p>
                            <p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $data3['kota']; ?></p>
                            <p><i class="fa fa-envelope"></i>&nbsp;<?php echo $data3['email']; ?></p>
                            <p><i class="fa fa-phone-square"></i>&nbsp;<?php echo $data3['telp']; ?></p>
                            
                        </div>
                        
                    </div>
                    <hr>
                    <h5 class="title-entry">Deskripsi Perusahaan</h5>
				    <p><?php echo $data3['deskripsi']; ?></p>
                </div>
            
        </div>
    </div>
</div>
