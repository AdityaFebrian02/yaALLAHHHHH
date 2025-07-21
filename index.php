<?php include 'db.php'; ?>

<?php
$total = $koneksi->query("SELECT COUNT(*) AS total FROM pap")->fetch_assoc()['total'];
$done = $koneksi->query("SELECT COUNT(*) AS done FROM pap WHERE status_upload = 'Done'")->fetch_assoc()['done'];
$belum = $koneksi->query("SELECT COUNT(*) AS belum FROM pap WHERE status_upload = 'Belum'")->fetch_assoc()['belum'];
$data = $koneksi->query("SELECT * FROM pap ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Data PAP</title>
    <link rel="icon" href="UT.jpg" type="image/jpg">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #A2AADB;
            padding: 20px;
            color: #fff;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-container img {
            height: 40px;
            width: auto;
        }

        .logo-container span {
            font-size: 24px;
            font-weight: bold;
        }

        .statistik {
            display: flex;
            justify-content: center;
            gap: 30px;
            background-color: #E3E5F2;
            padding: 15px;
            margin-top: 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .statistik span {
            font-size: 16px;
        }

        .actions {
            margin-top: 30px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-weight: bold;
            background-color: #A2AADB;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #8f99c7;
        }

        .search-box {
            margin-top: 30px;
            text-align: center;
        }

        .search-box input[type="text"] {
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .search-box input[type="submit"] {
            padding: 10px 15px;
            background-color: #A2AADB;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-left: 10px;
        }

        .search-box input[type="submit"]:hover {
            background-color: #8f99c7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            border: 1px solid #A2AADB;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #CED2EA;
            color: #333;
        }

        .aksi-btn {
            display: inline-block;
            padding: 6px 12px;
            margin: 2px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-hapus {
            background-color: #f44336;
            color: white;
        }

        .btn-hapus:hover {
            background-color: #d32f2f;
        }

    </style>
</head>
<body>

    <header>
        <div class="logo-container">
            <span>Dashboard Data PAP</span>
        </div>
    </header>

    <div class="statistik">
        <span>Total PAP: <?= $total ?></span>
        <span>Done Upload: <?= $done ?></span>
        <span>Belum Upload: <?= $belum ?></span>
    </div>

    <div class="actions">
        <a href="create.php" class="btn">➕ Tambah Data PAP</a>
    </div>

    <div class="search-box">
        <form action="search.php" method="GET">
            <input type="text" name="q" placeholder="Cari Nomor PAP..." required>
            <input type="submit" value="🔍 Cari">
        </form>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nomor PAP</th>
            <th>Status Upload</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nomor_pap'] ?></td>
            <td><?= $row['status_upload'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="aksi-btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="aksi-btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
