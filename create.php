<?php include 'db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomor = $_POST['nomor_pap'];
    $status = $_POST['status_upload'];
    $tanggal = $_POST['tanggal'];

    $koneksi->query("INSERT INTO pap (nomor_pap, status_upload, tanggal) VALUES ('$nomor', '$status', '$tanggal')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah PAP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Data PAP</h1>
    <form method="post">
        <label>Nomor PAP:</label>
        <input type="text" name="nomor_pap" required>

        <label>Status Upload:</label>
        <select name="status_upload">
            <option value="done upload">Done Upload</option>
            <option value="belum upload">Belum Upload</option>
        </select>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
