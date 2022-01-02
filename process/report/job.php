<!DOCTYPE html>
<html>
<head>
    <title>Data Lowongan Kerja</title>
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
            <font size="2"><b>REPORT LOWONGAN KERJA</b></font><br/>
            <font size="2">Periode : <?php echo DateIndo($start)." - ".DateIndo($end); ?></font>
        </td>
</table>

<hr style="border: double;">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th>Posisi</th>
            <th>Bidang Pekerjaan</th>
            <th>Jenis Industri Perusahaan</th>
            
        </tr>
        </thead>
        <tbody>
            <?php                

                $sql = "SELECT *FROM joblist a
                        LEFT JOIN perusahaan b ON 
                        (a.id_perusahaan=b.id_perusahaan)
                        LEFT JOIN bidang c ON 
                        (a.id_bidang=c.id_bidang)
                        LEFT JOIN jenis_industri d ON
                        (b.id_jenis=d.id_jenis)
                        LEFT JOIN user e ON 
                        (b.id_user=e.id_user)
                        LEFT JOIN kota f ON (f.id_kota=b.id_kota)
                    WHERE a.tgl_posting BETWEEN '{$start}' AND '{$end}'
                        ORDER BY a.id_job DESC";

                $res = $conn->query($sql);
                        
                $no = 0;
                // foreach ($res as $row) {
                    foreach ($res as $row => $data) {
                $no++;
            ?>                     
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?>,<?php echo $data['kota']; ?></td>
            <td><?php echo $data['posisi']; ?></td>
            <td><?php echo $data['bidang']; ?></td>
            <td><?php echo $data['jenis']; ?></td>
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
