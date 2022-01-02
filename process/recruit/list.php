
<div class="row">
    <div class="col-md-8">
        <h3 class="page-header"><small> Pelamar</small></h3>

<div class="btn-group" role="group" aria-label="...">   
    <a href="?p=recruit.list" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:5%;">No</th>
                        <th>Pelamar</th>
                        <th>Email</th>
                        <th>Posisi</th>
                        <th style="text-align:center;">Tgl Lamar</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['id_user'];
                        $sql = "SELECT id_perusahaan from perusahaan where id_user='$getID'";
                        $res = $conn->query($sql);
                        $id = $res->fetch_assoc();
                        $id_perusahaan=$id['id_perusahaan'];
                        

                        $sql2 = "SELECT *FROM apply a 
                                left join joblist b on a.id_job = b.id_job
                                left join pelamar c on a.id_pelamar = c.id_pelamar
                                left join user d on c.id_user = d.id_user
                                left join perusahaan e on b.id_perusahaan = e.id_perusahaan
                                WHERE a.id_perusahaan = $id_perusahaan ORDER BY tgl_apply desc";
                                echo $id_apply;
                    
                        $res = $conn->query($sql2);
                        $no  = 0;
                        foreach ($res as $row => $data) {
                            $status = $data['status_pelamar'];
                            if ($status === '0') {
                                $status = '<span class="label label-default">Pelamar Baru</span>';
                            } elseif ($status === '1') {
                                $status = '<span class="label label-success">Diterima</span>';
                            }
                            elseif ($status === '2') {
                                $status = '<span class="label label-danger">Ditolak</span>';
                            }
                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['nama_p']; ?></td>
                        <td ><?php echo $data['email'];?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_apply']), 'd/m/Y');?> </td>
                        <td style="text-align:center;"><?php echo $status;?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            
                            <a class="btn btn-default btn-xs" title="Proses Data" href="?p=recruit.review&id=<?php echo $data['id_apply']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                        </div>

                        </td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>
</div>
</div>