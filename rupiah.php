<?php
function rupiah($gajimin)
{
    $hasil_rupiah = "Rp " . number_format($gajimin, 0, ".", ".");
    return $hasil_rupiah;
}
?>