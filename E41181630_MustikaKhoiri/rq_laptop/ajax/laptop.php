<?php
sleep(1);
require '../function.php';

$keyword = $_GET["keyword"];
$dataLaptop = "SELECT * FROM laptop 
            WHERE MERK LIKE '%$keyword%'OR
            PROCESSOR LIKE '%$keyword%'OR
            RAM LIKE '%$keyword%'OR
            HARD_DISK LIKE '%$keyword%'OR
            VGA LIKE '%$keyword%'OR
            SOUND_CARD LIKE '%$keyword%'";
        
$laptop = query($dataLaptop);
?>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>NO.</th>
        <th>AKSI</th>
        <th>ID LAPTOP</th>
        <th>GAMBAR</th>
        <th>MERK</th>
        <th>PROCESSOR</th>
        <th>RAM</th>
        <th>HARD DISK</th>
        <th>VGA</th>
        <th>UKURAN LAYAR</th>
        <th>SOUND CARD</th>
        <th>STOK</th>
    </tr>

    <?php $i = 1;?>
    <?php foreach ($laptop as $row): ?>
    <tr>    
        <td><?= $i; ?></td>
        <td>
            <a href="ubah_laptop.php?ID_LAPTOP=<?= $row["ID_LAPTOP"]; ?>">Ubah</a>
            <a href="hapus_laptop.php?ID_LAPTOP=<?= $row["ID_LAPTOP"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');">Hapus</a>
        </td>
        <td><?= $row["ID_LAPTOP"];?></td>
        <td><img src="img/<?= $row["GAMBAR"];?>" alt="" width="50"></td>
        <td><?= $row["MERK"];?></td>
        <td><?= $row["PROCESSOR"];?></td>
        <td><?= $row["RAM"];?></td>
        <td><?= $row["HARD_DISK"];?></td>
        <td><?= $row["VGA"];?></td>
        <td><?= $row["UKURAN_LAYAR"];?></td>
        <td><?= $row["SOUND_CARD"];?></td>
        <td><?= $row["STOK"];?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>