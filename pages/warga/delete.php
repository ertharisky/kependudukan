<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_warga = htmlspecialchars($_GET['id_warga']);

// cegah hapus data sendiri
// if ($_SESSION['warga']['id_warga'] == $id_warga) {
//   echo "<script>window.alert('Tidak dapat menghapus data sendiri!'); window.location.href='../warga'</script>";
//   exit;
// }

// delete database
$query = "DELETE FROM warga WHERE id_warga = $id_warga";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.location.href='../warga'</script>";
} else {
  echo "<script>window.alert('Data warga gagal dihapus!'); window.location.href='../warga'</script>";
}
