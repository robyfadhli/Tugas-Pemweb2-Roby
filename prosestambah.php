<!DOCTYPE html>
<html>
    <head>
        <title>Upload File </title>
    </head>
    <body>
        <h1>Upload File </h1>
        
        <?php
        include 'koneksi.php';
        if($_POST['save']){
            
            // menangkap data yang di kirim dari form
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $kategori = $_POST['kategori'];
            $satuan = $_POST['Satuan'];
            $harga_modal = $_POST['harga_modal'];
            $harga_jual = $_POST['harga_jual'];
            $ekstensi_diperbolehkan = array('png','jpg','jpeg');
            $photo = $_FILES['file']['name'];
            $x = explode('.', $photo);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $namafile = 'img_'.$kode.'.jpg'; 
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070){ 
                    move_uploaded_file($file_tmp, 'file/'.$namafile);
                    $query = mysqli_query($koneksi,"insert into tb_barang(kode_br,nama_br,kategori,satuan,harga_modal,harga_jual,photo) values('$kode','$nama','$kategori','$satuan','$harga_modal','$harga_jual','$namafile')");
                    if($query){
                        
                        //echo 'FILE BERHASIL DI UPLOAD';
                        echo "<script>alert('DATA BERHASIL DI SIMPAN');window.location='index.php';</script>";
                    }else{
                        echo "<script>alert('DATA GAGAL DI SIMPAN');window.location='index.php';</script>";
                    }
                }else{
                    echo "<script>alert('UKURAN FILE TERLALU BESAR');window.location='tambahdata.php';</script>";
                }
            }else{
                echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');window.location='tambahdata.php';</script>";
            }
        }
        ?>
        </body>
        </html>