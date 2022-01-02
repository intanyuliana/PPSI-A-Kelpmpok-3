
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Lowongan</small></h3>
    
<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=perusahaan.tambah"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=perusahaan.list" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:20%;">Posisi</th>
                        <th style="text-align:center;">Tanggal Post/Akhir</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['id_user'];
                        $sql = "SELECT *FROM joblist a
                                LEFT JOIN perusahaan b ON 
                                    (a.id_perusahaan=b.id_perusahaan)
                                LEFT JOIN user c ON 
                                    (b.id_user=c.id_user)
                                WHERE c.id_user= '$getID' 
                                ORDER BY a.id_job DESC";

                        $res = $conn->query($sql);
                        $no  = 0;
                        
                        foreach ($res as $row => $data) {
                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td ><?php echo date_format(date_create($data['tgl_posting']), 'd/m/Y'). ' - ' .date_format(date_create($data['tgl_akhir']), 'd/m/Y');?> </td>
                        <td></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <!-- <a class="btn btn-default btn-xs" title="Konfirmasi" href="?p=job.confirm&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-check fa-fw"></i></a> -->
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=job.edit&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=job.delete&id=<?php echo $data['id_lowongan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data lowongan?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
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