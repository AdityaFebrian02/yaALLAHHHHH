<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pap WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomor = $_POST['nomor_pap'];
    $status = $_POST['status_upload'];
    $tanggal = $_POST['tanggal'];

    $koneksi->query("UPDATE pap SET nomor_pap='$nomor', status_upload='$status', tanggal='$tanggal' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit PAP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data PAP</h1>
    <form method="post">
        <label>Nomor PAP:</label>
        <input type="text" name="nomor_pap" value="<?= $data['nomor_pap'] ?>">

        <label>Status Upload:</label>
        <select name="status_upload">
            <option <?= $data['status_upload'] == 'done upload' ? 'selected' : '' ?>>done upload</option>
            <option <?= $data['status_upload'] == 'belum upload' ? 'selected' : '' ?>>belum upload</option>
        </select>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>">

        <button type="submit">Update</button>
    </form>
</body>
</html>
