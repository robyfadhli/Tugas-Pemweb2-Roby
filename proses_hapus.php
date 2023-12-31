<?php
include('koneksi.php');
if(isset($_GET['id'])){
$kode=$_GET['id'];
$namafile = 'img_'.$kode.'.jpg'; 

// Cek apakah file fotonya ada di folder images
if(is_file("file/".$namafile)){ // Jika foto ada
    unlink("file/".$namafile); // Hapus foto yang telah diupload dari folder images
}
$del=mysqli_query($koneksi,"DELETE FROM tb_barang WHERE kode_br='$kode'");
if($del){
    echo'Data BARANG berhasil dihapus! ';
    echo'<a href="index.php">Kembali</a>';
}else{
    echo'Gagal menghapus data! ';
    echo'<a href="index.php">Kembali</a>';
}
}
?>