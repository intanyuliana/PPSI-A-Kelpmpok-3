<div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Pengalaman & Sertifikat</small></h5>
            <div class="panel panel-default">
            <div class="panel-heading">Edit Pengalaman & Sertifikat</div>
                <div class="panel-body">
                    <?php
                        $id = $_GET['id'];
                        $sql = "SELECT *FROM pengalaman a join pelamar b on a.id_pelamar=b.id_pelamar
                         WHERE a.id = $id";
                        $res = $conn->query($sql);
                        $data = $res->fetch_assoc();
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                        <form class="" role="form" style="margin-top: 10px;" action="?p=pengalaman.action" id="defaultForm" method="post" enctype="multipart/form-data">
	                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="id_pelamar" value="<?php echo $data['id_pelamar'] ?>">
	                    
	                   
	                    <div class="form-group">
	                        <label>Deskripsi Pengalaman</label>
	                            <textarea type="text" name="desk_pengalaman" class="form-control" required><?php echo $data['desk_pengalaman'];?></textarea>
	                            <i style="color:grey;">(Nama organisasi, jabatan, kegiatan, dsb)</i>
	                    </div>
	                    <div class="form-group">
	                        <label>Tahun</label>
	                            <input type="text" name="tahun" class="form-control" value="<?php echo $data['tahun'];?>">
	                    </div>
	                    <div class="form-group">
	                    <label> Upload Sertifikat</label>
	                            <input type="file" name="sertifikat" class="form-control" value="<?php echo $data['tahun'];?>"><a href="dist/file/sertifikat/<?php echo $data['sertifikat']; ?>"><?php echo $data['sertifikat']; ?></a>
	                            <br>
                                <i style="color:red;">*File tipe .pdf, .doc, .docx</i>
                                <i style="color:grey;">(Jika ada)</i>
	                    </div>
	                    <div class="form-group">
	                    <label></label>
	                        <a class="btn btn-default" href="?p=pengalaman.list">Batal</a>
	                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
	                    </div>                   
	                    </form>
	                    </div>
                    </div>
	            </div>
	        </div>
	    </div>
</div>
	