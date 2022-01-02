
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Kategori Pekerjaan</small></h3>
    
<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=bidang.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=bidang.list" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="panel-body">
<div class="row">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th >Nama Bidang Pekerjaan</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT *FROM bidang";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['bidang']; ?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-xs" title="Edit Data" href="?p=bidang.edit&id=<?php echo $data['id_bidang']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=bidang.delete&id=<?php echo $data['id_bidang']; ?>" onclick="return confirm('Apakah anda yakin menghapus data bidang kerja?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
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