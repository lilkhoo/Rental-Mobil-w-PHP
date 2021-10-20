<?php
session_start();
require '../functions.php';
$mobils = query("SELECT * FROM tb_mobil");

$id_user = $_SESSION['userdata']['id'];
$pemesan = query("SELECT * FROM tb_pelanggan WHERE id_pemesan = '$id_user'");
if ($pemesan != []) {
    $pemesan = $pemesan[0];
}


if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
    exit;
}

// PENGEMBALIAN MOBIL
if (isset($_POST['kembalikan'])) {
    $id_mobil = $_POST['id_mobil'];
    $id_pemesan = $_POST['id_pemesan'];
    if ($pemesan != []) {
        mysqli_query($koneksi, "UPDATE `tb_mobil` SET `disewa`='t' WHERE id = '$id_mobil'");
        if (mysqli_affected_rows($koneksi)) {
            mysqli_query($koneksi, "DELETE FROM `tb_pelanggan` WHERE id_pemesan = '$id_pemesan'");
            echo "<script>
                alert('Mobil berhasil dikembalikan, terimakasih penyewaanya!');
                window.location.href = './index.php';
                    </script>";
        }
    }
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Sinar Mobil | Rental Mobil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo" style="color: yellow;">SinarMobil</div>
        <div class="nav-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="maps.php">Tentang Kami</a></li>
            <li><a href="../logout.php">Logout</a></li>
            <li><a href="#"> </a></li>
            <li><a href="#"> </a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" placeholder="Search" autocomplete="off" id="keyword" name="keyword" class="fas fa-search"></button>
        </form>
    </nav>

    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="https://i.ytimg.com/vi/8oXvWv90ndM/maxresdefault.jpg" style="width:100%">
            <div class="text">
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="https://cdn.motor1.com/images/mgl/3ynGK/s3/h-r-toyota-yaris-gr.jpg" style="width:100%">
            <div class="text">
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2020/04/02/1553003735.jpg" style="width:100%">
            <div class="text">
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>

    </div>

    <div class="navbar center">
        <ul>
            <li><a href="../lihat/index.php">Mobil</a></li>
            <li><a href="harga.php">Harga</a></li>
        </ul>
    </div>
    <!-- Pembuka Isi Daftar Mobil -->
    <center>
        <br>
        <div class="table-container">
            <table>
                <tr>
                    <?php foreach ($mobils as $mobil) : ?>
                        <td>
                            <div class="badan">
                                <div class="list-produk">
                                    <img src="../../admin/img/<?= $mobil['gambar'] ?>" alt="">

                                    <h4><?= $mobil['merk'] ?></h4>
                                    <h5><?= 'Rp.' . $mobil['harga'] ?></h5>
                                    <br>
                                    <?php if ($mobil['disewa'] === 't') { ?>
                                        <a class="tombol tombol-detail" href="./costumerservice.php?merk=<?= $mobil['merk'] ?>&id_mobil=<?= $mobil['id'] ?>&pemesan=<?= $id_user ?>">Sewa</a>
                                    <?php } elseif ($pemesan != [] && $id_user === $pemesan['id_pemesan']) { ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="id_pemesan" id="Id_pemesan" value="<?= $pemesan['id_pemesan'] ?>">
                                            <input type="hidden" name="id_mobil" id="id_mobil" value="<?= $mobil['id'] ?>">
                                            <input type="submit" name="kembalikan" value="Kembalikan mobil" class="tombol tombol-detail">
                                        </form>
                                    <?php } else { ?>
                                        <button class="tombol tombol-detail" disabled>Mobil sedang disewa</button>
                                    <?php } ?>
                                    <a class="tombol tombol-beli" href="harga.php">Lihat</a>
                                </div>
                            </div>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>

    </center>
    <br>
    <br>



    <!-- Penutup Isi Daftar Mobil -->

    <!-- Pembuka Footer  -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4 style="color: orangered;">10+ Tahun Pengalaman</h4>
                    <p>Rental Mobil Di miliki dan dikelola Oleh orang- orang yang telah berpengalaman lama dibidang jasa rental mobil. selama lebih dari 10 tahun kami selalu mementingkan Kualitas Servis yang kami berikan.</p>
                </div>
                <div class="footer-col">
                    <h4 style="color: orangered;">Harga Bersaing!</h4>
                    <p>Kami menawarkan harga rental mobil yang kompetitif, kualitas servis yang baik dan menyediakan mobil-mobil yang dirawat secara tetatur, serta berasuransi dengan kondisi yang prima.</p>
                </div>
                <div class="footer-col">
                    <h4 style="color: orangered;">Keluaran Terbaru</h4>
                    <p>Anda tidak perlu khawatir mendapatkan mobil yang sudah tua! Mobil Rental yang kami sediakan adalah mobil dengan kondisi mobil yang sangat bagus yang akan membuat anda nyaman selama dalam perjalanan</p>
                </div>
                <div class="footer-col">
                    <h4 style="color: orangered;">Contack</h4>
                    <table style="color: white;">
                        <tr>
                            <td>Hub</td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td> +62 8694-8945-1542</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td> Sinarmobil@gmail.com</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </footer>
    <!-- Penutup Footer  -->



    <script>
        const menuBtn = document.querySelector(".menu-icon span");
        const searchBtn = document.querySelector(".search-icon");
        const cancelBtn = document.querySelector(".cancel-icon");
        const items = document.querySelector(".nav-items");
        const form = document.querySelector("form");
        menuBtn.onclick = () => {
            items.classList.add("active");
            menuBtn.classList.add("hide");
            searchBtn.classList.add("hide");
            cancelBtn.classList.add("show");
        }
        cancelBtn.onclick = () => {
            items.classList.remove("active");
            menuBtn.classList.remove("hide");
            searchBtn.classList.remove("hide");
            cancelBtn.classList.remove("show");
            form.classList.remove("active");
            cancelBtn.style.color = "#ff3d00";
        }
        searchBtn.onclick = () => {
            form.classList.add("active");
            searchBtn.classList.add("hide");
            cancelBtn.classList.add("show");
        }

        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Ganti Gambar Setiap 2 detik
        }
    </script>

    <script src="./s/jquery-3.6.0.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>