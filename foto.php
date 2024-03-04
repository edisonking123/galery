<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    
    <link rel="stylesheet" href="css/stylealbum.css">
    <link rel="stylesheet" href="stylemu.css">
    <style>
        table{
            width: 50%;
            border-collapse:;
            margin_bottom: 20px;

        }
        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: grey;
        }
        footer{
    background-color: #111;
  }
  .konten{
    position: absolute;
    left:0px;
  }
  .user-img{
 
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin: 15% 45%;
  }
  #photo{
    width: 80px;
    height: 80px;
    border-radius: 50%;
  }
  #file{
    display: none;
  }
  #uploadbtn{
    position: absolute;
    height: 30px;
    width: 30px;
    padding: 6px 6px;
    border-radius: 50%;
    cursor: pointer;
    color: #ffffff;
    transform: translateX(-90%);
    background-color: #000000;
    box-shadow: 2px 4px 4px rgb(0, 0, 0 ,0.644);
    margin-top: 60px;
  }
    </style>
</head>
<body>
<div class="main">
        <div class="icon">
            <h2 class="logo">E_King<a href="profil.html">👑</a></h2> <h1><center>My Picture</center></h1>
            <nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
    </div>

    <div class="konten">
    <div class="user-img">
        <img src="ini.jpg" id="photo">
        <input type="file" id="file">
        <label for="file" id="uploadbtn"></label><i class="fa-camera"></i></label>
        <p><b><?=$_SESSION['namalengkap']?></b></p>
        <p><B><a href="bio.php">Profil</a></B></p>
        <p><b><a href="fotoo.php">Posting</a></b></p>
        <p><b><a href="foto.php">My picture</a></b></p>
    </div>
</div>
  <br>
  <center><button><a href="fotoo.php">Posting</a></center></button>
    <br>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
       <center>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                <?php
                       $fotoid=$data['fotoid'];
                       $sql2=mysqli_query($conn,"select * from komentarfoto where fotoid='$fotoid'"); 
                     
                    ?>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">komentar (<?php echo mysqli_num_rows($sql2)?>)</a>
                </td>
                    <td>
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
        </div>
        </center>
     
    </div>
</body>
</html>