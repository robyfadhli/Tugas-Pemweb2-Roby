<!DOCTYPE html>
<html>
    <head>
        <title>Tambah data barang</title>
    </head>
    <body>
        <h1>Tambah Data Barang</h1>
        <br/>
        <a href="index.php">Data Barang</a>
        <br/><br/>
        <form action="prosestambah.php" method="post" enctype="multipart/form-data">
            <table width="400" >
                
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode"></td>
            </tr>
            
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama" requied></td>
            </tr>
            

            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori" required></td>
            </tr>

            <tr>
                <td>Satuan</td>
                <td>
                    <Select name=Satuan>
                        <option value= - >...Pilih...</option>
                        <option value=Unit UNIT>Unit</option>
                        <option value=Pcs PCS>Pcs</option>
                        <option value=Buah BUAH>Buah</option>
                    </select>

                </td>
            </tr>

            <tr>
                <td>Harga Modal</td>
                <td><input type="text" name="harga_modal"></td>
            </tr>

            <tr>
                <td>Harga Jual</td>
                <td><input type="text" name="harga_jual"></td>
            </tr>
            
            <tr>
                <td>Photo</td>
                <td><input type="file" name="file"></td>
            </tr>

            <tr>
                <td></td>
                
                <td>
                    <br/><br/>
                    <input name="save" type="submit" value="SIMPAN">
                    <input name="BtnBatal" type="reset" value="BATAL" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>