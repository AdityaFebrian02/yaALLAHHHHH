<?php
include 'db.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM pap WHERE id=$id");
header("Location: index.php");
?>
