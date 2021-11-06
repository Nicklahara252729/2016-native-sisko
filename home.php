<?php
include"koneksi.php";   
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=deive-width, height=device-height, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <title>Welcome <?php echo"siswa";?></title>
        <link href="css/sisko.css" rel="stylesheet">
    </head>
    <body>
        <header>
        </header>
        <div class="container">
            <div class="content">
                <div class="siswa">
                    <table>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Jurusan</td>
                            <td>Jenkel</td>
                            <td>Tanggal Lahir</td>
                            <td>Agama</td>
                            <td>Alamat</td>
                        </tr>
                        <?php
                        $nicksql=mysql_query("select * from siswa");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            echo"<tr>
                            <td>$r[nisn]</td>
                            <td>$r[nama]</td>
                            <td>$r[jurusan]</td>
                            <td>$r[jenkel]</td>
                            <td>$r[tgllahir]</td>
                            <td>$r[agama]</td>
                            <td>$r[alamat]</td>
                            </tr>
                            ";
                        }
                        ?>
                    </table>
                </div>
                <div class="">
                </div>
            </div>
        </div>
        <footer>
            <div class="content-footer">
                <p>Copyright &copy; 2016 All right reserved by Nico Lahara</p>
            </div>
        </footer>
    </body>
</html>