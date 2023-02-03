<?php
require_once "../config.php";
$fakultas = $_GET['fakultas'];
$prodi2 = mysqli_query($con, "SELECT * FROM prodi WHERE id_fakultas='$fakultas' ORDER BY id_prodi");
    while($row_prodi = mysqli_fetch_array($prodi2))
        {
            echo "<option value=\"".$row_prodi['id_prodi']."\">".$row_prodi['prodi']."</option>\n";
        }
?>