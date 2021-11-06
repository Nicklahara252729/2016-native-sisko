<?php
include"koneksi.php";   
if(isset($_POST['nisn'])){
    
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=deive-width, height=device-height, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <title>Welcome <?php echo"admin";?></title>
        <link href="css/sisko.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/sisko.js"></script>
    </head>
    <body>
        <header>
            <div class="header-atas">
                <div class="content-header">
                    
                </div>
            </div>
            <div class="header-bawah">
                <div class="content-header">
                    <ul>
                        <li class="li-siswa">Data Siswa (<b>inner join</b>)</li>
                        <li class="li-guru">Data Guru (<b>Stright Join</b>)</li>
                        <li class="li-jadwal">Jadwal (<b> Natural Right Outer Join</b>)</li>
                        <li class="li-nilai">Data Nilai (<b>cross join</b>)</li>
                        <li class="li-mapel">Mata Pelajara (<b>Natural Left join</b>)</li>
                        <li class="li-user">Data User</li>
                        <li class="li-input">Tambah Data</li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="content">
                <div class="siswa">
                    <table>
                        <tr class="judul">
                            <td>No</td>
                            <td>NIS</td>
                            <td>Nama Siswa</td>
                            <td>Jurusan</td>
                            <td>Jenkel</td>
                            <td>Tanggal Lahir</td>
                            <td>Agama</td>
                            <td>Kelas</td>
                            <td>Nilai</td>
                            <td>Mapel</td>
                            <td>Nama Guru</td>
                            <td>Hari</td>
                            <td>Ruang</td>
                        </tr>
                        <?php
                        $batas=10;
                        $nicksql=mysql_query("select * from siswa inner join guru inner join jadwal inner join nilai inner join pelajaran limit $batas");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            echo"<tr>
                            <td>$no</td>
                            <td>$r[nisn]</td>
                            <td>$r[nama]</td>
                            <td>$r[jurusan]</td>
                            <td>$r[jenkel]</td>
                            <td>$r[tgllahir]</td>
                            <td>$r[agama]</td>
                            <td>$r[kelas]</td>
                            <td>$r[nilai]</td>
                            <td>$r[mapel]</td>
                            <td>$r[nama_guru]</td>
                            <td>$r[hari]</td>
                            <td>$r[ruang]</td>
                            </tr>
                            ";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <div class="guru">
                     <table>
                        <tr class="judul">
                            <td>No</td>
                            <td>NIP</td>
                            <td>Nama</td>
                            <td>Golongan</td>
                            <td>Status</td>
                            <td>Hari </td>
                            <td>Jam</td>
                            <td>Ruang</td>
                            <td>Tindakan</td>
                        </tr>
                        <?php
                         $batas=10;
                        $nicksql=mysql_query("select * from guru stright join jadwal limit $batas");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            echo"<tr>
                            <td>$no</td>
                            <td>$r[nip]</td>
                            <td>$r[nama_guru]</td>
                            <td>$r[gol]</td>
                            <td>$r[status]</td>
                            <td>$r[hari]</td>
                            <td>$r[jam]</td>
                            <td>$r[ruang]</td>
                            <td></td>
                            </tr>
                            ";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <div class="nilai">
                     <table>
                        <tr class="judul">
                            <td>No</td>
                            <td>NIS</td>
                            <td>Nama</td>
                            <td>Jurusan</td>
                            <td>Nilai</td>
                            <td>Kelas</td>
                            <td>Tindakan</td>
                        </tr>
                        <?php
                         $batas=10;
                        $nicksql=mysql_query("select * from siswa cross join nilai limit $batas");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            echo"<tr>
                            <td>$no</td>
                            <td>$r[nisn]</td>
                            <td>$r[nama]</td>
                            <td>$r[jurusan]</td>
                            <td>$r[nilai]</td>
                            <td>$r[kelas]</td>
                            </tr>
                            ";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <div class="jadwal">
                     <table>
                        <tr class="judul">
                            <td>No</td>
                            <td>Mata Pelajaran</td>
                            <td>Hari </td>
                            <td>Ruangan</td>
                            <td>Tindakan</td>
                        </tr>
                        <?php
                         $batas=10;
                        $nicksql=mysql_query("select * from pelajaran right join jadwal on pelajaran.kode_mapel='01' and jadwal.kode_mapel='01'");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            echo"<tr>
                            <td>$no</td>
                            <td>$r[mapel]</td>
                            <td>$r[hari]</td>
                            <td>$r[ruang]</td>
                            </tr>
                            ";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <div class="pelajaran">
                     <table>
                        <tr class="judul">
                            <td>No</td>
                            <td>Mata Pelajaran</td>
                            <td>Nama Guru </td>
                            <td>Status</td>
                            <td>Tindakan</td>
                        </tr>
                        <?php
                         $batas=10;
                        $nicksql=mysql_query("select * from pelajaran left join guru on pelajaran.kode_guru='G01' and guru.kode_guru='G01'");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            echo"<tr>
                            <td>$no</td>
                            <td>$r[mapel]</td>
                            <td>$r[nama_guru]</td>
                            <td>$r[status]</td>
                            </tr>
                            ";
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <div class="user">
                     <table>
                        <tr class="judul">
                            <td>No</td>
                            <td>Nama</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>Email</td>
                            <td>Level</td>
                            <td>Foto</td>
                        </tr>
                        <?php
                        $nicksql=mysql_query("select * from user");
                        $no=1;
                        while ($r=mysql_fetch_array($nicksql)){
                            ?>
                         <tr>
                             <td><?php echo $no; ?></td>
                             <td><?php echo $r['nama']; ?></td>
                             <td><?php echo $r['username']; ?></td>
                             <td><?php echo $r['password']; ?></td>
                             <td><?php echo $r['email']; ?></td>
                             <td><?php echo $r['level']; ?></td>
                             <td><img src="img/<?php echo $r['foto']; ?>"></td>
                         </tr>
                         <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <div class="input">
                    <form id="input" name="input" action="#" method="post" target="_self" enctype="multipart/form-data">
                        <input type="text" name="nisn" id="nisn" placeholder="Masukkan NISN" required>
                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required>
                        <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" required>
                        <input type="text" name="jenkel" id="jenkel" placeholder="Jenis Kelamin" required>
                        <input type="text" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir (Tahun-Bulan-Tanggal)" required>
                        <input type="text" name="agama" id="agama" placeholder="Agama " required>
                        <input type="text" name="no_hp" id="nisn" placeholder="No Telp" required>
                        <input type="text" name="nisn" id="nisn" placeholder="Nama Ayah" required>
                        <input type="text" name="nisn" id="nisn" placeholder="Pekerjaan Ayah" required>
                        <input type="text" name="nisn" id="nisn" placeholder="No Telp Ayah" required>
                        <input type="text" name="nisn" id="nisn" placeholder="Nama Ibu" required>
                        <input type="text" name="nisn" id="nisn" placeholder="Pekerjaan Ibu" required>
                        <input type="text" name="nisn" id="nisn" placeholder="Alamat" required>
                        <button type="submit" name="submit" id="submit">Simpan Data</button>
                        <button type="reset" name="reset" id="reset">Cancel</button>
                    </form>
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