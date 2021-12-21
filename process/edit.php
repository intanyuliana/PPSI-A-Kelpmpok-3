
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small> Profil Pelamar</small></h3>
        
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Pelamar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $GetID  = $_SESSION['id_user'];
            $sql = "SELECT *FROM pelamar a
                    LEFT JOIN user b ON (a.id_user=b.id_user) 
                    LEFT JOIN fakultas c ON (a.id_fakultas=c.id_fakultas)
                    LEFT JOIN jurusan d ON (d.id_jurusan=a.id_jurusan)
                    WHERE a.id_user = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

            $sql = "SELECT * FROM fakultas";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $fakultas .= "<option value='{$row['id_fakultas']}'> {$row['nama_fakultas']} </option>";
            }

            $sql = "SELECT * FROM jurusan";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $jurusan .= "<option value='{$row['id_jurusan']}'> {$row['nama_jurusan']} </option>";
            }
               
            
        ?>    
                   
                <form class="" role="form" style="margin: 10px 30px 20px 20px" action="?p=pelamar.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $GetID; ?>">
                    
                    <div class="form-group">
                    <label> Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Nama</label>
                        <input type="text" class="form-control" name="nama_p" value="<?php echo $data['nama_p']; ?>" placeholder="Nama" required/>
                    </div>
                    
                    <div class="form-group">
                    <label> Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" placeholder="Tempat Lahir" required/>
                    </div>
                    <div class="form-group">
                    <label> Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir"  class="form-control" value="<?php echo $data['tgl_lahir'];?>"/>
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <select class="form-control" name="jk" required>
                            <option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Agama</label>
                        <select class="form-control" name="agama" value="<?php echo $data['agama'];?>" required/>
                            <option value="<?php echo $data['agama'];?>"><?php echo $data['agama'];?></option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required/>
                    </div>
                    
                    
                    <div class="form-group">
                    <label> No. Telp</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $data['telp']; ?>" placeholder="No. Telp" required/>
                    </div>

                    

                    <div class="form-group">
                        <label>Fakultas</label>
                        <select class="form-control" name="id_fakultas" value="<?php echo $data['id_fakultas'];?>" required/>
                            <?php echo $fakultas; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="id_jurusan" value="<?php echo $data['id_jurusan'];?>" required/>
                            
                            <?php echo $jurusan; ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Tahun Masuk</label>
                        <input type="text" class="form-control" name="tahun_masuk" value="<?php echo $data['tahun_masuk']; ?>" placeholder="Keahlian" required/>
                    </div>

                    <div class="form-group">
                    <label> Keahlian</label>
                        <textarea type="text" class="form-control" name="keahlian" value="<?php echo $data['keahlian']; ?>" placeholder="Keahlian" required><?php echo $data['keahlian']; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                    <label> Foto</label>
                        <input type="file" name="foto"/><img src="dist/images/foto/<?php echo $data['foto'];?>" width="90" height="90" required/>
                    </div>
                    
                    <div class="form-group">
                         <?php 
                            $sql = "SELECT nama_p FROM pelamar WHERE id_user = '$GetID' ";
                            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                          
                
                            if ( $result['nama_p'] === NULL) 
                            { ?>
                                <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                            <?php }  else { ?>
                                <button class="btn btn-primary" type="submit" name="edit">Edit</button>
                            <?php } ?>
                           
                            <a class="btn btn-default" href="?p=pelamar.profil">Batal</a>
                        
                    </div>                      
                </form>
            </div>
        </div>
    </div>
</div>
</div>
