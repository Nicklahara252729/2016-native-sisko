<?php
include"koneksi.php";
if(isset($_POST['username'])){
    $nicknama   = strip_tags(trim($_POST['nama']));
    $nickuser   = strip_tags(trim($_POST['username']));
    $nickpass   = sha1(strip_tags(trim($_POST['password'])));
    $nickemail  = strip_tags(trim($_POST['email']));
    $nicklevel  = strip_tags(trim($_POST['level']));
    $nickfoto   = $_FILES['foto']['name']?$_FILES['foto']['name']:"basic.png";
    $nicksize     = $_FILES['foto']['size'];
    $nicksql    = mysql_query("select * from user where username='$nickuser'");
    $nickjml    = mysql_num_rows($nicksql);
    if($nickjml > 0){
        ?>
<script>alert('Username : <?php echo $nickuser;?> sudah ada'); history.back();</script>
<?php
    }else{
        $nicksimpan=mysql_query("insert into user set nama='$nicknama', username='$nickuser',password='$nickpass', email='$nickemail', level='$nicklevel', foto='$nickfoto'");
        if($nicksimpan && isset($_FILES['foto']['name'])){
            move_uploaded_file($_FILES['foto']['tmp_name'], "img/".$nickfoto);
        }
    }
}
?>
<?php
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <title>SISIKO</title>
        <link href="css/sisko.css" rel="stylesheet">
        <script>
            function cekpass(){
                var pass=document.getElementById('password').value;
                var pass1=document.getElementById('password').value;
                var pass2=document.getElementById('confirm').value;
                if(pass.length<8 && pass1!=2){
                    document.getElementById('msgpass').style.color="red";
                    document.getElementById('msgpass').innerHTML="Password harus lebih dari 8 karakter";
                    document.getElementById('password').focus();
                    return false;
                }
                else if(pass.length>=8 && pass2.length<=0){
                    document.getElementById('msgpass').style.color="green";
                    document.getElementById('msgpass').innerHTML="Password good";
                }
                else if(pass.length>=8 && pass1!=pass2){
                    document.getElementById('msgpass').style.color="red";
                    document.getElementById('msgpass').innerHTML="Password tidak sama";
                    document.getElementById('confirm').focus();
                    return false;
                }
                else if(pass.length>=8 && pass1==pass2){
                    document.getElementById('msgpass').style.color="blue";
                    document.getElementById('msgpass').innerHTML="Password sesuai";
                }
                return true;
            }
            function cekfoto(){
                var filein=document.getElementById('foto');
                var info=filein.files[0];
                var size=info.size;
                if(size > 2097152){
                    document.getElementById('msgfoto').style.color="red";
                    document.getElementById('msgfoto').innerHTML="Foto tidak lebih dari 2 Mb. Foto anda : "+(size/1048576)+" Mb";
                    document.getElementById('msgfoto').focus();
                    return false;
                }else{
                    document.getElementById('msgfoto').style.color="blue";
                    document.getElementById('msgfoto').innerHTML="Foto diterima : "+(size/1024)+" kb";
                }
                return true;
            }
        </script>
    </head>
    <body>
        <header>
        </header>
        <div class="container">
            <div class="content">
                <div class="isi-content">
                    <div class="register">
                        <form action="#" target="_self" id="login" name="login" enctype="multipart/form-data" method="post">
                            <input type="text" id="nama" name="nama" placeholder="Nama lengkap" required>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                            <input type="password" id="password" name="password" placeholder="Password" required onblur="cekpass()">
                            <input type="password" id="confirm" name="confirm" placeholder="Confirm Password" required onblur="cekpass()" onfocus="cekpass()">
                            <div id="msgpass"></div>
                            <input type="text" name="email" id="email" placeholder="Your email" required onfocus="cekpass()">
                            <label for="level">Pilih Hak Akses :</label><br>
                            <select name="level" id="level">
                                <?php
                                $level=array('Admin','Guru','Sisiwa');
                                for($i=0;$i<=2;$i++){
                                    echo"<option value'$level[$i]'>$level[$i]</option>";
                                }
                                ?>
                            </select><br>
                            <input type="file" name="foto" id="foto" onfocus="cekfoto()" onchange="cekfoto()">
                            <div id="msgfoto"></div><br>
                            <button type="submit" id="submit" name="submit">Log in</button>
                            <button type="reset" id="reset" name="reset" onclick="history.back()">Cancel</button>
                        </form>
                    </div>
                </div>
                <div class="isi-content">
                    <div class="login">
                        <form action="#" target="_self" id="login" name="login" enctype="multipart/form-data" method="post">
                            <input type="text" id="username" name="username" placeholder="Username" required>
                            <input type="password" id="password" name="password" placeholder="Password" required><br>
                            <input type="checkbox"  id="cek" name="cek"> Remember Me <br>
                            <button type="submit" id="submit" name="submit">Log in</button>
                            <button type="reset" id="reset" name="reset" onclick="history.back()">Cancel</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="content-footer">
                <p>Copyright &copy; 2016 All rights reserved by Nico Lahara</p>
            </div>
        </footer>
    </body>
</html>