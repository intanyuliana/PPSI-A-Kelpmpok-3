<!DOCTYPE html>
<html>
<head>
    <title>Data Perusahaan</title>
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
            <font size="2"><b>REPORT DATA PERUSAHAAN</b></font><br/>
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
            <th>No Telepon</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
            <?php                

                $sql = "SELECT * FROM user a
                                INNER JOIN perusahaan b ON a.id_user = b.id_user
                                INNER JOIN kota c on c.id_kota = b.id_kota
                        WHERE a.tgl_daftar BETWEEN '{$start}' AND '{$end}' AND a.uac ='PERUSAHAAN'
                                ORDER BY a.id_user DESC";

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
            <td><?php echo $data['telp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            
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
