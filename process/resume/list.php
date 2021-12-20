
<div class="row">
    <div class="col-md-8">
        <h3 class="page-header"><small> Resume</small></h3>

<div class="btn-group" role="group" aria-label="...">
    <a href="?p=resume.list" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th >Perusahaan</th>
                        <th style="width:15%;">Posisi</th> 
                        <th style="text-align:center;">CV</th>
                        <th style="text-align:center;">Tanggal Lamar</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $getID = $_SESSION['id_user'];

                        $sql2 = "SELECT id_pelamar FROM pelamar where id_user = '$getID'";
                         $res = $conn->query($sql2);
                        $data2 = $res->fetch_assoc();

                        $id_pelamar = $data2['id_pelamar'];
                        $sql = "SELECT *FROM apply a 
                                left join joblist b on a.id_job = b.id_job
                                left join pelamar c on c.id_pelamar = a.id_pelamar
                                left join perusahaan d on b.id_perusahaan = d.id_perusahaan

                                WHERE a.id_pelamar = $id_pelamar ORDER BY id_apply desc";
                                    
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {
                            $status = $data['status_apply'];
                            if ($status === '0') {
                                $status = '<span class="label label-default">TERKIRIM</span>';
                            } elseif ($status === '1') {
                                $status = '<span class="label label-success">DITERIMA</span>';
                            } elseif ($status === '2') {
                                $status = '<span class="label label-danger">DITOLAK</span>';
                            }
                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><img src="dist/images/logo/<?php echo $data['logo'];?> " width="30" height="30"/> <?php echo $data['nama']; ?></td>
                        <td ><?php echo $data['posisi'];?></td>
                        <td ><a href="dist/file/cv/<?php echo $data['file']; ?>"><?php echo $data['file'];?></a></td>
                        <td style="text-align:center;"><?php echo date_format(date_create($data['tgl_apply']), 'd/m/Y');?> </td>
                        <td style="text-align:center;"><?php echo $status;?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=resume.review&id=<?php echo $data['id_apply']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <!-- <a href="?p=resume.delete&id=<?php echo $data['id_apply']; ?>" onclick="return confirm('Apakah anda yakin menghapus data lamaran?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a> -->
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