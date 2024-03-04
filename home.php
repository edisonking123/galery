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
    <title>Halaman Album</title>
    
   
<link rel="stylesheet" href="css/stylealbum.css">
    <link rel="stylesheet" href="stylemu.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    
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
  .footerContainer{
    width: 100%;
    padding: 70px 30px 20px;
  }
  .sosialIcons{
    display: flex;
    justify-content: center;
  }
  .sosialIcons a{
    text-decoration: ;
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
            <h2 class="logo">E_King<a href="profil.html">👑<a></h2> <h1><center>Beranda </center></h1>
            </div>
    </div>
    
    <nav>
    <ul>
<li><a href="home.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    
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
   <center>
    
    <div class="content">
      <h1>Conten<span> </span><br></h1>
      <p class="par"></p>
<div class="print">
      <button><a target="_blank" href="cetak.php">Cetak</a></button>
    </div><br>
    </div>
    </center>
<center>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
      
            <th>like</th>
            <th>Komentar</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
        
                <td>
                <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        
                    ?>
                <div class='middle-wrapper'>
        <div class='like-wrapper'>
          <a class='like-button' href="like.php?fotoid=<?=$data['fotoid']?>">
            <span class='like-icon'>
              <div class='heart-animation-1'></div>
              <div class='heart-animation-2'></div>
            </span>
           <?php
            echo mysqli_num_rows($sql2);
           ?>
          </a>
            </td>
<td>
                <?php
                       $fotoid=$data['fotoid'];
                       $sql2=mysqli_query($conn,"select * from komentarfoto where fotoid='$fotoid'"); 
                     
                    ?>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">komentar(<?php echo mysqli_num_rows($sql2)?>)</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <div class="footerCointainer">
        <div class="socialIcon">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footernav">
   
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; Disigned By <span class="designer">Edison King</span>
        </div>
    </div>
    <script src="main.js" crossorigin=""></script>
</body>
</html>
  </body>
  </html>
