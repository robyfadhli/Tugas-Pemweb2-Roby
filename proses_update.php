<?php
// koneksi database
include 'koneksi.php';
//Memproses data saat form di submit
if(isset($_POST["kode"]) && !empty($_POST["kode"])){
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$satuan = $_POST['satuan'];
$harga_modal = $_POST['harga_modal'];
$harga_jual = $_POST['harga_jual'];
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$photo = $_FILES['file']['name'];
$x = explode('.', $photo);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$namafile = 'img_'.$kode.'.jpg'; 
if(empty($file_tmp)){
    $update=mysqli_query($koneksi,"UPDATE tb_barang SET nama_br='$nama',kategori='$kategori',satuan='$satuan',harga_modal='$harga_modal',harga_jual='$harga_jual' WHERE kode_br='$kode'")or die(mysql_error()); 
    if($update){
        //echo 'BERHASIL';
        echo "<script>alert('DATA BERHASIL DI UPDATE');window.location='index.php';</script>";
    }else{
        echo "<script>alert('UPDATE GAGAL');window.location='index.php';</script>";
    }
}else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if ($ukuran < 1044070){
            if(move_uploaded_file($file_tmp, 'file/'.$namafile)){ 
                // Cek apakah gambar berhasil diupload atau tidak
                $update=mysqli_query($koneksi,"UPDATE tb_barang SET nama_br='$nama',kategori='$kategori',satuan='$satuan',harga_modal='$harga_modal',harga_jual='$harga_jual',photo='$namafile' WHERE kode_br='$kode'")or die(mysql_error());
                if($update){
                    echo "<script>alert('DATA BERHASIL DI UPDATE');window.location='index.php';</script>";
                }else{
                    echo "<script>alert('DATA GAGAL DI UPDATE');window.location='index.php';</script>";
                }
            }else{
                echo "<script>alert('GAGAL MENGUPLOAD GAMBAR');window.location='index.php';</script>";
            }
        }else{
            echo "<script>alert('UKURAN FILE TERLALU BESAR');window.location='tambahdata.php';</script>";
        }
    }else{
        echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');window.location='edit_databarang.php?id=$kode';</script>";
    }
}
}
?>