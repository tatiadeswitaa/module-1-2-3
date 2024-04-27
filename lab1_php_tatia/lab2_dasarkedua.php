<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Dasar</title>
</head>
<body>
<h2>Form Input</h2>
<form method="post">
    <label>Nama: </label>
    <input type="text" name="nama">
    <input type="submit" value="Kirim">
</form>
<?php
echo 'Selamat Datang ' . $_POST['nama'];
?>
</body>
<body>
<h2>Operator</h2>
<?php
$gaji = 1000000;
$pajak = 0.1;
$thp = $gaji - ($gaji*$pajak);
echo "Gaji sebelum pajak = Rp. $gaji <br>";
echo "Gaji yang dibawa pulang = Rp. $thp";
?>
</body>
<body>
<h2>Kondisi IF</h2>
<?php
$nama_hari= date("1");
if ($nama_hari == "sunday"){
    echo "Minggu";
} elseif ($nama_hari == "monday"){
    echo  "Senin";
} else {
    echo "Selasa";
}
?>
</body>
<body>
<h2>Kondisi switch<h2>
<?php
$nama_hari = date("1");
switch ($nama_hari) {
    case "sunday":
         echo "Minggu";
          break;
    case "Monday":
         echo "Senin";
         break;
    case "Tuesday";
         echo "Selasa";
         break;
        default:
            echo "Sabtu";
    }
    ?>
</body>
<body>
    <h2>Perulangan For</h2>
    <?php
    echo "Perulangan 1 sampai 10 <br />";
    for ($i=1; $i<=10; $i++) {
        echo "Perulangan ke: " . $i . '<br />';
    }
    echo '<br />';
    echo "Perulangan Menurun dari 10 ke 1 <br />";
    for ($i=10; $i>=1; $i--){
        echo "Perulangan ke: " . $i . '<br />';
    }
    ?>
</body>
<body>
    <h2>Perulangan While</h2>
    <?php
    echo "Perulangan 1 sampai 10 <br />";
    $i=1;
    while ($i<=10) {
        echo "Perulangan ke: " . $i . '<br />';
        $i++;
    }
    ?>
</body>
<body>
    <h2>Perulangan Dowhile</h2>
    <?php
    echo "Perulangan 1 sampai 10 <br />";
    $i=1;
    do {
        echo "Perulangan ke: " . $i . '<br />';
        $i++;
    } while ($i<=10);
    ?>
</body>
</html>