<?php
ob_start();
require_once '../config/db.php';
$postt = $_POST['btpub'];
$zametk = $_GET['zametka'];
$result = $dbConnect->query("SELECT * FROM zametki WHERE idz=$zametk");
$row = mysqli_fetch_array($result);
if(isset($postt)) {
    $idusz = $row['iduser'];
    $titlecz = $_REQUEST['titlez'];
    $contentcz = $_REQUEST['contentz'];
    $dbConnect->query("INSERT INTO confirmzametki (idusercz,titlecz,contentcz) VALUES ('$idusz','$titlecz','$contentcz')");
    $dbConnect->query("DELETE FROM zametki WHERE idz=$zametk");
    header("Location:../views/zametki.php");
}
?>