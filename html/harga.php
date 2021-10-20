<?php
require '../functions.php';

$detail = query("SELECT * FROM tb_mobil");
?>
<html>

<head>
  <meta charset="utf-8" />
  <title>Sinar Mobil | Rental Mobil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/table.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <nav>
    <div class="menu-icon">
      <span class="fas fa-bars"></span>
    </div>
    <div class="logo" style="color: yellow">SinarMobil</div>
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
      <input type="search" class="search-data" placeholder="Search" required />
      <button type="submit" class="fas fa-search"></button>
    </form>
  </nav>

  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="https://i.ytimg.com/vi/8oXvWv90ndM/maxresdefault.jpg" style="width: 100%" />
      <div class="text">
        <div style="text-align: center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="https://cdn.motor1.com/images/mgl/3ynGK/s3/h-r-toyota-yaris-gr.jpg" style="width: 100%" />
      <div class="text">
        <div style="text-align: center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2020/04/02/1553003735.jpg" style="width: 100%" />
      <div class="text">
        <div style="text-align: center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="navbar center">
    <ul>
      <li><a href="index.php">Mobil</a></li>
      <li><a href="harga.php">Harga</a></li>
    </ul>
  </div>

  <table class="demo-table responsive">
    <caption class="title"></caption>
    <caption class="title">
      Harga Sewa Mobil
    </caption>
    <thead>
      <tr>
        <th scope="col">Nama Mobil</th>
        <th scope="col">Tipe mobil</th>
        <th scope="col">Jumlah Penumpamg</th>
        <th scope="col">Harga Sewa</th>
      </tr>
    </thead>

    <body>
      <?php foreach ($detail as $detail) : ?>
        <tr>
          <td data-header="Nama Mobil" class="title"><?= $detail['merk'] ?></td>
          <td data-header="Tipe mobil"><?= $detail['jenis'] ?></td>
          <td data-header="Jumlah Penumpamg"><?= $detail['jml_penumpang'] . ' Orang' ?></td>
          <td data-header="Harga Sewa">Rp <?= $detail['harga'] . ',-' ?></td>
        </tr>
      <?php endforeach; ?>
    </body>
  </table>
  <br />
  <br />
  <!-- Pembuka Footer  -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4 style="color: orangered">10+ Tahun Pengalaman</h4>
          <p>
            Rental Mobil Di miliki dan dikelola Oleh orang- orang yang telah
            berpengalaman lama dibidang jasa rental mobil. selama lebih dari
            10 tahun kami selalu mementingkan Kualitas Servis yang kami
            berikan.
          </p>
        </div>
        <div class="footer-col">
          <h4 style="color: orangered">Harga Bersaing!</h4>
          <p>
            Kami menawarkan harga rental mobil yang kompetitif, kualitas
            servis yang baik dan menyediakan mobil-mobil yang dirawat secara
            tetatur, serta berasuransi dengan kondisi yang prima.
          </p>
        </div>
        <div class="footer-col">
          <h4 style="color: orangered">Keluaran Terbaru</h4>
          <p>
            Anda tidak perlu khawatir mendapatkan mobil yang sudah tua! Mobil
            Rental yang kami sediakan adalah mobil dengan kondisi mobil yang
            sangat bagus yang akan membuat anda nyaman selama dalam perjalanan
          </p>
        </div>
        <div class="footer-col">
          <h4 style="color: orangered">Contack</h4>
          <p>Hub : +62 8694-8945-1542</p>
          <p>Email : Sinarmobil@gmail.com</p>
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
    };
    cancelBtn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    };
    searchBtn.onclick = () => {
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    };

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
        slideIndex = 1;
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>
</body>

</html>