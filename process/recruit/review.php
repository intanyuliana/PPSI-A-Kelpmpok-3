
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small>Review Resume</small></h3>
        
            <div class="panel panel-default">
            <div class="panel-heading">Info Resume</div>
                <div class="panel-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Foto Pelamar</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>Nama Lowongan</th>
                    </tr>
                </thead>
                <tbody>
                    
            <?php
                $GetID  = $_GET['id'];
            
                $sql ="SELECT *FROM apply a 
                        left join joblist b on a.id_job = b.id_job
                        left join pelamar c on a.id_pelamar = c.id_pelamar
                        left join user e on c.id_user = e.id_user
                        left join perusahaan d on b.id_perusahaan = d.id_perusahaan
                        WHERE a.id_apply = $GetID";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();

                $status = $data['status_pelamar'];
                    if ($status === '0') {
                        $status = '<span class="label label-default">Pelamar Baru</span>';
                    } elseif ($status === '1') {
                        $status = '<span class="label label-primary">Undang Interview</span>';
                    } elseif ($status === '2') {
                        $status = '<span class="label label-success">Ditolak</span>';
                    } 
            ?>
                <tr>
                <td style="text-align: center;"><img src="dist/images/foto/<?php echo $data['foto']; ?>" width="80" height="80"></td>
                    <td><?php echo $data['nama_p']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['posisi']; ?></td>
                </tr>
                </tbody>
                </table>
                   
                <form class="" role="form" action="?p=recruit.action" id="defaultForm" method="post" enctype="multipart/form-data">

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
                       foreach ($res as $row => $data2) {
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
                        <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
                        <input type="hidden" name="pass" value="<?php echo $data['pass']; ?>">
                        <input type="hidden" name="nama" value="<?php echo $data['nama']; ?>">
                        <input type="hidden" name="posisi" value="<?php echo $data['posisi']; ?>">
                        <input type="hidden" name="status_apply" value="<?php echo $data['status_apply']; ?>">
                        <input type="hidden" name="uname" value="<?php echo $data['uname']; ?>">
                        <td>
                            <textarea id="editor" name="pesan" class="form-control" placeholder="Tulis pesan disini"><?php echo $data['pesan'];?></textarea>
                        </td><br>
                        
                    </tr>
                </tbody>
                </table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="status_pelamar">
                                <option value="<?php echo $data['status_pelamar']; ?>" name="status"><?php echo $status; ?></option>
                                <option value="1">Diterima</option>
                                <option value="2">Ditolak</option>
                            </select>


                        </td>
                    </tr>
                </tbody>
                </table>
                    <button class="btn btn-primary pull-right" type="submit" name="update">Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>

