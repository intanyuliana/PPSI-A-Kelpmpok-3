
<div class="row">
    <div class="col-lg-8">
        <h3 class="page-header"><small>Data Pelamar</small></h3>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=admin.add_pelamar"><i class="fa fa-plus fa-fw"></i> Tambah</a>
    <a href="?p=admin.list_pelamar" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
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
                        <th >Fakultas</th>
                        <th>Jurusan</th>
                        <th>Tahun Masuk</th>
                        <th >No Telepon</th> 
                        <th >Email</th>             
                        <th style="text-align:center;width:1%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM user a LEFT JOIN pelamar b ON a.id_user = b.id_user LEFT JOIN Fakultas c ON b.id_fakultas = c.id_fakultas LEFT JOIN jurusan d ON b.id_jurusan = d.id_jurusan WHERE a.uac = 'PELAMAR' ORDER BY tahun_masuk DESC";
                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['uname']; ?></td>
                        <td ><?php echo $data['nama_p']; ?></td>
                        <td ><?php echo $data['nama_fakultas']; ?></td>
                        <td ><?php echo $data['nama_jurusan']; ?></td>
                        <td ><?php echo $data['tahun_masuk']; ?></td>
                        <td ><?php echo $data['telp'];?></td>
                        <td ><?php echo $data['email'];?></td>
                        
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">

                        <a class="btn btn-default btn-xs" title="Lihat Profil" href="?p=admin.detail_pelamar&id=<?php echo $data['id_user']; ?>" ><i class="fa fa-bars fa-fw"></i></a>
                            <a href="?p=pelamar.delete&id=<?php echo $data['id_user']; ?>" onclick="return confirm('Apakah anda yakin menghapus data pelamar?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
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