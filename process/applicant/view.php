
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Pelamar</small></h3>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=applicant.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=applicant.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th >Username</th>
                        <th >Nama</th>
                        <th >Alamat</th>
                        <th >No Telepon</th> 
                        <th >Email</th>
                        <th style="text-align:center;">Foto</th>               
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM tb_pelamar a
                                LEFT JOIN tb_user b ON a.user_id = b.user_id
                                ORDER BY a.id_pelamar DESC";
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['uname']; ?></td>
                        <td ><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></td>
                        <td ><?php echo $data['alamat']; ?></td>
                        <td ><?php echo $data['no_hp'];?></td>
                        <td ><?php echo $data['email'];?></td>
                        <td style="text-align:center;"><img src="dist/images/foto/<?php echo $data['foto'];?>" width="30" height="30"></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=applicant.edit&id=<?php echo $data['id_pelamar']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
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