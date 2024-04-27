# Tugas Pemograman Web 2

Nama : Idris Syahrudin

Nim : 312210467

Kelas : TI.22.A5

Mata Kuliah : Pemrograman web

Dosen Pengampu : Agung Nugroho, S.Kom., M.Kom.

# Persiapan

<p>Untuk memulai membuat aplikasi CRUD sederhana, yang perlu disiapkan adalah database server menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.</p>

## Menjalankan MySQL Server

- Untuk menjalankan MySQL Server dari menu XAMPP Contol.

![MySQL_Server](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/9654e111-49e8-485a-abe2-74c43329761c)

- Pastikan Web server Apache dan MySQL Server sudah dijalankan. Kemudian buka melalui browser: http://localhost/phpmyadmin/

## Membuat Database

1. Pilih menu `SQL` lalu jalankan perintah berikut.

```sql
CREATE DATABASE latihan1;
```

2. Kemudian buat `Table` dengan cara klik menu `SQL` lagi, kemudian masukan perintah berikut.

```sql
USE latihan1;
CREATE TABLE data_barang(
    id_barang int(11) PRIMARY KEY AUTO_INCREMENT,
    nama varchar(30) NOT NULL,
    kategori varchar(30) NOT NULL,
    gambar text NOT NULL,
    harga_beli decimal(10,0) NOT NULL,
    harga_jual decimal(10,0) NOT NULL,
    stok int(4) NOT NULL
);
```

![database](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/f0e3dc28-b44e-462b-9868-50997e6d3711)

3. Setelah itu, Tambahkan data dalam table tersebut dengan memasukan perintah berikut.

```sql
INSERT INTO `data_barang` (`id_barang`, `nama`, `kategori`, `gambar`, `harga_beli`, `harga_jual`, `stok`) VALUES (NULL, 'HP Samsung Android', 'Elektronik', 'gambar/HP samsung.jpg', '30000000', '30500000', '1'), (NULL, 'HP Xiaomi', 'Elektronik', 'gambar/HP xiaomi.jpg', '6070000', '6080000', '2');
```

![databarang](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/88415f1b-4133-41b0-a171-1ccb9f1f1ab9)

## Membuat Program CRUD

1. Buat folder Lab3Web pada root directory Web server (C:\xampp\htdocs)
2. Kemudian buat file baru dengan nama `koneksi.php`, Lalu masukan kode berikut.

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false) {
    echo "Koneksi ke server gagal.";
    die();
} #else echo "Koneksi berhasil";
```

3. Jika gambarnya seperti ini maka berhasil koneksi ke database. Untuk menyampilkan pesan koneksi berhasil,
   uncomment pada perintah var_dump($koneksi);

![koneksi](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/095f8e49-e3f1-4991-b625-10804e8e0d3e)

## Menampilkan Data (Read)

- Buat file baru dengan nama `index.php`, Kemudian masukan kode berikut.

```php
<?php
include "koneksi.php";

$query = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Sederhana</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
</head>

<body>
    <div>
        <h4 class="py-2 px-3" style="background-color: #667fa0; color: white;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-clipboard-check my-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                <path
                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                <path
                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
            </svg> Aplikasi CRUD Sederhana
        </h4>
    </div>
    <div class="container">
        <h4 class="mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-basket2"
                viewBox="0 0 16 16">
                <path
                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                <path
                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
            </svg> Data Barang
        </h4>
        <a href="tambah.php" class="btn btn-success btn-sm mb-4 float-end">Tambah Barang</a>

        <table class="table table-sm table-bordered">
            <tr class="text-center fw-bold text-uppercase">
                <td>No</td>
                <td>Gambar</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Stok</td>
                <td>Aksi</td>
            </tr>
            <?php
            if ($result->num_rows > 0) {

                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center">
                    <img src="gambar/<?= $data['gambar'] ?>" alt="<?= $data['nama']; ?>" width="50px" />
                </td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['kategori'] ?></td>
                <td>
                    Rp.<?= $data['harga_beli'] ?>
                </td>
                <td>
                    Rp.<?= $data['harga_jual'] ?>
                </td>
                <td><?= $data['stok'] ?></td>
                <td class="text-center">
                    <a href="ubah.php?id_barang=<?= $data['id_barang'] ?>" class="btn btn-warning btn-sm mx-1">Edit</a>
                    <a href="proses.php?id_barang=<?= $data['id_barang'] ?>&aksi=hapus"
                        class="btn btn-danger btn-sm mx-1">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                ?>
            <tr>
                <td colspan="8" class="text-center">Data Kosong</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
```

- Maka hasilnya akan seperti berikut.

![read](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/b56c43da-1dae-4f81-8552-b66f17a9679a)

## Menambah Data (Create)

- Buat file baru dengan nama `tambah.php`, Kemudian masukan kode berikut.

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Sederhana</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    />
  </head>

  <body>
    <div class="container">
      <div class="row m-0">
        <div class="col-md-5 mx-auto">
          <div class="card mt-3">
            <div class="card-header text-center">
              <h3>Tambah Barang</h3>
            </div>
            <div class="card-body">
              <form
                action="proses.php"
                method="post"
                enctype="multipart/form-data"
              >
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Barang</label>
                  <input
                    type="text"
                    name="nama"
                    id="nama"
                    placeholder="Masukan nama barang"
                    class="form-control"
                  />
                </div>
                <div class="mb-3">
                  <label for="kategori" class="form-label"
                    >Kategori Barang</label
                  >
                  <input
                    type="text"
                    name="kategori"
                    id="kategori"
                    placeholder="Masukan kategori barang"
                    class="form-control"
                  />
                </div>

                <label for="harga_beli" class="form-label">Harga Beli</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">Rp.</span>
                  <input
                    type="number"
                    name="harga_beli"
                    id="harga_beli"
                    placeholder="Masukan Harga Beli"
                    class="form-control"
                  />
                </div>

                <label for="harga_jual" class="form-label">Harga Jual</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">Rp.</span>
                  <input
                    type="number"
                    name="harga_jual"
                    id="harga_jual"
                    placeholder="Masukan Harga Jual"
                    class="form-control"
                  />
                </div>

                <div class="mb-3">
                  <label for="stok" class="form-label">Stok</label>
                  <input
                    type="number"
                    class="form-control"
                    name="stok"
                    placeholder="Masukan Stok Barang"
                  />
                </div>

                <div class="mb-3">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    class="form-control form-control-sm"
                  />
                </div>

                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-success" name="tambah" type="submit">
                  Tambah
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
```

- Maka hasilnya akan seperti berikut.

![create](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/df76f1c3-8da3-41ca-a90a-81cf300fd245)

- Kemudian, tambahkan file baru dengan nama `proses.php` yang mana fungsi ini akan digunakan untuk memproses semuanya.
- Masukan kode berikut.

```php
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // -- Tambah Barang --
    if (isset($_POST['tambah'])) {
        $input = (object) $_POST;

        $nama = ucwords(strtolower($input->nama));
        $kategori = ucwords(strtolower($input->kategori));
        $harga_beli = $input->harga_beli;
        $harga_jual = $input->harga_jual;
        $stok = $input->stok;
        $file_gambar = $_FILES['gambar'];
        $gambar = NULL;

        if ($file_gambar['error'] == 0) {
            $nama = str_replace(' ', '_', $file_gambar['name']);
            $path = dirname(__FILE__) . '/gambar/' . $nama;

            if (move_uploaded_file($file_gambar['tmp_name'], $path)) {
                $gambar = $nama;
            }
        }

        $query = "INSERT INTO data_barang (nama, kategori, harga_beli, harga_jual, stok, gambar) ";
        $query .= "VALUE ('$nama', '$kategori', '$harga_beli', '$harga_jual', '$stok', '$gambar') ";

        $result = mysqli_query($conn, $query);

        header('location:index.php');

        // -- Ubah Barang --
    } else if (isset($_POST['ubah'])) {
        $input = (object) $_POST;

        $nama = ucwords(strtolower($input->nama));
        $kategori = ucwords(strtolower($input->kategori));
        $harga_beli = $input->harga_beli;
        $harga_jual = $input->harga_jual;
        $stok = $input->stok;
        $file_gambar = $_FILES['gambar'];
        $gambar = NULL;

        if ($file_gambar['error'] == 0) {
            $nama = str_replace(' ', '_', $file_gambar['name']);
            $path = dirname(__FILE__) . '/gambar/' . $nama;

            if (move_uploaded_file($file_gambar['tmp_name'], $path)) {
                $gambar = $nama;
            }
        }

        $query = "UPDATE data_barang SET nama = '$nama', kategori = '$kategori', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok'";

        if (!empty($gambar)) {
            $query .= ", gambar = '$gambar' ";
        }
        $query .= "WHERE id_barang = $input->id_barang";
        $result = mysqli_query($conn, $query);

        header('location:index.php');
    }

    // -- Hapus barang --
} else if (isset($_GET['id_barang']) && $_GET['aksi'] == "hapus") {

    $id = $_GET['id_barang'];
    $query = "DELETE FROM data_barang WHERE id_barang = $id";

    $result = mysqli_query($conn, $query);

    header('location:index.php');
}
```

- Jika berhasil, maka data baru sukses ditambahkan.

![tambah](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/ed2df9e0-7102-431a-b6eb-1f174d8dfa91)

## Mengubah Data (Update)

- Buat file baru dengan nama `ubah.php`, Kemudian masukan kode berikut.

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Sederhana</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row m-0">
            <div class="col-md-5 mx-auto">
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h3>Ubah Barang</h3>
                    </div>
                    <div class="card-body">
                        <?php
            include "koneksi.php";

            $id = $_GET['id_barang'];
            $query = "SELECT * FROM data_barang ";
            $query .= "WHERE id_barang = $id";

            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_array($result);
            ?>
                        <form action="proses.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_barang" value="<?= $id ?>" />
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukan nama barang"
                                    class="form-control" value="<?= $data['nama'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Barang</label>
                                <input type="text" name="kategori" id="kategori" placeholder="Masukan kategori"
                                    class="form-control" value="<?= $data['kategori'] ?>" />
                            </div>

                            <label for="harga_beli" class="form-label">Harga Beli</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga_beli" id="harga_beli" placeholder="Masukan Harga Beli"
                                    class="form-control" value="<?= $data['harga_beli'] ?>" />
                            </div>

                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga_jual" id="harga_jual" placeholder="Masukan Harga Jual"
                                    class="form-control" value="<?= $data['harga_jual'] ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" placeholder="Masukan Stok Barang"
                                    value="<?= $data['stok'] ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control form-control-sm"
                                    value="<?= $data['gambar'] ?>" />
                            </div>

                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-primary" name="ubah" type="submit">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
```

- Maka hasilnya akan seperti berikut.

![ubahbarang](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/8b135000-b26d-4adf-a7a7-4a6cb36d7eb2)

## Menghapus Data (Delete)

- Pada button delete, Ubah hrefnya ke `proses.php` dengan membawa 2 parameter yaitu id_barang dan aksi.
- Tambahkan kode berikut ke dalam file `proses.php`.

```php
    // -- Hapus barang --
} else if (isset($_GET['id_barang']) && $_GET['aksi'] == "hapus") {

    $id = $_GET['id_barang'];
    $query = "DELETE FROM data_barang WHERE id_barang = $id";

    $result = mysqli_query($koneksi, $query);

    header('location:index.php');
}
```

- Maka hasilnya akan seperti berikut.

![delete](https://github.com/IdrisSyahrudin/Lab3Web/assets/129921422/c445ff79-47dc-4092-8590-7d9b10502a27)

# Terima Kasih!
