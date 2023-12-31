<!DOCTYPE html>
<html>
    <head>
    <title>Tambah Data </title>
</head>
<body>
    <h1>Tambah Data Barang</h1>
    <?php
    include 'koneksi.php';
    ?>
    <br/>
    <a href="tambahdata.php">Tambah Data</a>
    <br/><br/>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga Modal</th>
            <th>Harga Jual</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($koneksi,"select * from tb_barang");
        while($d = mysqli_fetch_array($data)){
            ?>


            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['kode_br']; ?></td>
                <td><?php echo $d['nama_br']; ?></td>

                <td><?php echo $d['kategori']; ?></td>
                <td><?php echo $d['satuan']; ?></td>
                <td><?php echo "Rp. " . number_format ($d['harga_modal']); ?></td>
                <td><?php echo "Rp. " . number_format ($d['harga_jual']); ?></td>

                    <td>
                        <img src="<?php echo "file/".$d['photo']; ?>" width="80" height="80" >
                    </td>
                    <td>
                        <a href="edit_databarang.php?id=<?php echo $d['kode_br']; 
                        ?>">Edit</a> |
                        <a href="proses_hapus.php?id=<?php echo $d['kode_br']; ?>"
                        onclick="return confirm ('Anda yakin akan menghapus data ini? \n<?php echo $d['kode_br']; ?>')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <br/>
                <?php
                echo "Total data : ". mysqli_num_rows($data)." Barang";
                ?>
                </body>
                </html>
