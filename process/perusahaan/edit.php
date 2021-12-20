
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small> Profil Perusahaan</small></h3>
        
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Perusahaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $GetID  = $_SESSION['id_user'];
            $sql = "SELECT *FROM perusahaan a
                    LEFT JOIN user b ON (a.id_user=b.id_user) 
                    LEFT JOIN jenis_industri c ON (c.id_jenis=a.id_jenis)
                    LEFT JOIN kota d ON (d.id_kota=a.id_kota)
                    WHERE a.id_user = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

            $sql = "SELECT * FROM jenis_industri";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $jenis_industri .= "<option value='{$row['id_jenis']}'> {$row['jenis']} </option>";
            }
            $sql2 = "SELECT * FROM kota";
            $res = $conn->query($sql2);
            while ($row2 = $res->fetch_assoc()) {
            $kota .= "<option value='{$row2['id_kota']}'> {$row2['kota']} </option>";
            }
               
            
        ?>    
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=perusahaan.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $GetID; ?>">          
            
                    <div class="form-group">
                        <label> Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label> No. NPWP Perusahaan</label>
                        <input type="text" class="form-control" name="npwp" value="<?php echo $data['npwp']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Jenis Industri</label>
                        <select class="form-control" name="id_jenis" value="<?php echo $data['id_jenis'];?>" required>
                            <?php echo $jenis_industri; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kota</label>
                        <select class="form-control" name="id_kota" value="<?php echo $data['id_kota'];?>" required>
                            <?php echo $kota; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>"/>
                    </div>

                    <div class="form-group">
                    <label>No. Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $data['telp']; ?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label> Logo Perusahaan</label>
                        <input type="file" name="logo" value="<?php $data['logo']; ?>" /><?php $data['logo']; ?>
                    </div>

                    <div class="form-group">
                    <label> Deskripsi Perusahaan</label>
                        <textarea id="editor" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"><?php echo $data['deskripsi']; ?></textarea>
                    </div>
                    <div class="form-group">
                         <?php 
                            $sql = "SELECT nama FROM perusahaan WHERE id_user = '$GetID' ";
                            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                            
                
                            if ( $result['nama'] === NULL) 
                            { ?>
                                <button class="btn btn-primary" type="submit" name="save">Tambah</button>
                            <?php }  else { ?>
                                <button class="btn btn-primary" type="submit" name="edit">Edit</button>
                            <?php } ?>
                           
                            <a class="btn btn-default" href="?p=perusahaan.profil">Batal</a>
                        
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
