<?php include 'db.php'; ?>
<?php
$q = $_GET['q'] ?? '';
$data = $koneksi->query("SELECT * FROM pap WHERE nomor_pap LIKE '%$q%'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            background-color: #A2AADB;
            padding: 20px;
            text-align: center;
            color: #fff;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #A2AADB;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #C9D0EE;
            color: #333;
        }

        .btn-kembali {
            background-color: #A2AADB;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 6px;
            border: none;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 30px;
        }

        .btn-kembali:hover {
            background-color: #8a95c5;
        }

        .center {
            text-align: center;
        }

        /* Tombol aksi */
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

    <h1>Hasil Pencarian: <?= htmlspecialchars($q) ?></h1>

    <?php if ($data->num_rows > 0): ?>
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
                <a href="hapus.php?id=<?= $row['id'] ?>" class="aksi-btn btn-hapus" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p class="center">Data tidak ditemukan untuk "<strong><?= htmlspecialchars($q) ?></strong>"</p>
    <?php endif; ?>

    <div class="center">
        <a href="index.php" class="btn-kembali">← Kembali ke Dashboard</a>
    </div>

</body>
</html>
