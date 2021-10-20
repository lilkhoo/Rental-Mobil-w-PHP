<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sinar Mobil | Rental Mobil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <nav>
        <a href="index.php"><i class="fas fa-arrow-alt-circle-left" style="font-size: 2em; color: white; position: absolute; left: 30px; cursor: pointer; top: 20px; "></i></a>

        <h3 style="margin: 0 auto; font-size: 23px; color: yellow;">Sinar Mobil</h3>
    </nav>


    <?php
    session_start();
    require '../lihat/functions.php';
    $mobils = query("SELECT * FROM tb_mobil");
    $merk = (isset($_GET["merk"])) ? $_GET["merk"] : 'Avanza';
    $id_mobil = (isset($_GET["id_mobil"])) ? $_GET["id_mobil"] : null;
    $id_pemesan = (isset($_GET["pemesan"])) ? $_GET["pemesan"] : null;
    $kota  = (isset($_GET['kota'])) ? $_GET['kota'] : ""; 
    $Kecamatan = (isset($_GET['Kecamatan'])) ? $_GET['Kecamatan'] : ""; 
    $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : "";   
    $tgl = explode("-", $tanggal); 
    $tanggalkembali = isset($_GET['tanggalkembali']) ? $_GET['tanggalkembali'] : "";   
    $tglkembali = explode("-", $tanggalkembali);
    ?>
    <div class="contain">
        <div class="form">
            <br><br>
            <center>
                <h2>Sewa Mobil Terpercaya</h2>
            </center>           
            <br>
            <form action="struk.php" method="post">
                <input type="hidden" name="id_mobil" id="id_mobil" value="<?= $id_mobil ?>">
                <input type="hidden" name="id_pemesan" id="id_pemesan" value="<?= $id_pemesan ?>">
                <p>
                    <label for="nama">Your name</label>
                    <input type="text" name="nama" id="nama">
                </p>
                <p>
                    <label for="mobil">Mobil</label>
                     <input type="teks" name="mobil" readonly value="<?php echo " " . $merk; ?>">
                <p>
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email">
                </p>
                <p>
                    <label for="notelp">No.Telp</label>
                    <input type="teks" name="notelp" id="notelp">
                </p>
                <p>
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" required>
                </p>
                <p>
                    <label for="Kecamatan">Kecamatan</label>
                    <input type="text" name="Kecamatan" required>
                </p>
                <p>
                    <label for="Tanggal">Tanggal Sewa</label>
                    <input type="date" name="tanggal" required>
                </p>
                <p>
                    <label for="tanggalkembali">Tanggal Kembali</label>
                    <input type="date" name="tanggalkembali" required>
                </p>
                <p class="full-width">
                    <label for="pesan">Write your message</label>
                    <textarea name="pesan" id="pesan" cols="30" rows="7"></textarea>
                </p>
                <p class="full-width">
                    <button type="submit" name="submit">Send</button>
                </p>
            </form>
        </div>
    </div>
    </div>


    
    <br>
    <br>
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
</body>

</html>