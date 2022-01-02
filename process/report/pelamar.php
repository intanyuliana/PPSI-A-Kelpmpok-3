<!DOCTYPE html>
<html>
<head>
    <title>Data Pelamar Kerja</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print(); ">
<div class="container-fluid">
<div class="col-lg-12 col-md-offset-0">
<br/>

<?php
    $tgl     = explode('-',$_POST['start']);
    $start   = $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

    $tgl     = explode('-',$_POST['end']);
    $end     = $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

?>

<table  style='font-family: "Arial"; '> 
    
        <td >
            <font size="2"><b>REPORT DATA PELAMAR</b></font><br/>
            <font size="2">Periode : <?php echo DateIndo($start)." - ".DateIndo($end); ?></font>
        </td>
</table>

<hr style="border: double;">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelamar</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Fakultas/Jurusan</th>
            <th>No. Telp</th>
            
        </tr>
        </thead>
        <tbody>
            <?php                

                $sql = "SELECT * FROM user a
                        LEFT JOIN pelamar b ON a.id_user = b.id_user
                        LEFT JOIN jurusan c ON c.id_jurusan=b.id_jurusan
                        LEFT JOIN fakultas d ON d.id_fakultas=b.id_fakultas
                        WHERE a.tgl_daftar BETWEEN '{$start}' AND '{$end}' AND a.uac='PELAMAR'
                        ORDER BY a.id_user DESC";

                

                $res = $conn->query($sql);
                        
                $no = 0;
                // foreach ($res as $row) {
                    foreach ($res as $row => $data) {
                $no++;
            ?>                     
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama_p']; ?></td>
            <td><?php echo $data['jk']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['tempat_lahir']; ?>, <?php echo date_format(date_create($data['tgl_lahir']), 'd/m/Y');?></td>
            <td><?php echo $data['nama_fakultas']; ?>/<?php echo $data['nama_jurusan']; ?></td>
            <td><?php echo $data['telp']; ?></td>

        </tr>
                    
            <?php
                }
            ?>

        </tbody>
        </table>
    </div>
</div>
</body>
</html>
