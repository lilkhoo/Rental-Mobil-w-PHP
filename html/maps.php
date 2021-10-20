<!DOCTYPE html>
<html>
<head>
	<title>Sinar Mobil | Rental Mobil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/maps.css">
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
            <li><a href="#">Tentang  Kami</a></li>
            <li><a href="../logout.php">Logout</a></li>
            <li><a href="#"> </a></li>
            <li><a href="#"> </a></li>
        </div>
        <div class="search-icon"></div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        
    </nav>

<center>
    <section>
    <div class="img">
        <img src="../images/image.jpg">
    </div>
    <div class="img">
        <table>
            <tr>
                <td><h2>Tentang Kami</h2></td>
            </tr>
            <tr>
                <td class="kata">
                    <p>
                        <span style="color: orangered; font-weight: bold;">Sinar Mobil</span>  memiliki tim dan driver yang berpengalaman dalam menyediakan berbagai unit kendaraan berkualitas , fasilitas berkelas, pefoma yang prima, dan tentu dengan tarif sewa yang negotiable. Sebagai jasa sewa mobil murah di Jawa Barat kami berkomitmen untuk memberikan pelayanan yang terbaik, baik dari segi kualitas ataupun kuantitas, karena kepuasan setiap pelanggan adalah prioritas utama.
                     </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="img">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0134284858063!2d106.84164251449721!3d-6.645253366809582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89505b4c37d%3A0x307fc4a38e65fa2b!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1622168369542!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>
</center>

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

       
    </script>

<script src="./s/jquery-3.6.0.min.js"></script>
<script src="./js/script.js"></script>
</body>
</html>