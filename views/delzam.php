<?php
require_once '../config/db.php';
$zametk = $_GET['zametka'];
$dbConnect->query("DELETE FROM zametki WHERE idz=$zametk");
header("Location:../views/zametki.php");
?>