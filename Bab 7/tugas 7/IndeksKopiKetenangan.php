<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KOPI KETENANGAN</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <header id="navbar">
      <div class="container" >
        <img src="asset/logo.png" alt="logo" class="logo"/>
        <nav>
          <ul type="square">
            <li><a href="#">Home</a></li>
            <li><a href="RegisterKopiKetenangan.html">Register</a></li>
            <li><a href="adminkopi.html">Admin</a></li>
            <li><a href="adminkopi.html">Katalog</a></li>
            <li><a href="adminkopi.html">Lokasi</a></li>
            <li class="login"><a href="LoginKopiKetenangan.php">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section class="News">
      <div class="isi">
        <h2>Grind The</2>
        <h2>Essentials</h2>
        <p>Dibuat dari biji kopi Indonesia pilihan untuk</p> 
        <p>pengalaman minum kopi terbaik setiap hari</p>
        <a href="RegisterKopiKetenangan.html" class="btn">Get Started</a>
      </div>
    </section>
    <section class="testimoni">
      <div>
        <img class="g1" src="asset/1.png" alt="">
        <img class="g2" src="asset/2.png" alt="">
      </div>
      <h1>Product</h1> 
      <h2>Coba Produk Unggulan Kami Sekarang</h2>
      <div class="carousel">
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="asset/produk/2.png" alt="Produk 1">
                <div class="item-content">
                    <h3>Cappucino</h3>
                    <p>Harga: $10</p>
                    <button id="popupBtn" onclick="beli()" value="Cappucino">Beli Sekarang</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/produk/1.png" alt="Produk 2">
                <div class="item-content">
                    <h3>Caffe Latte</h3>
                    <p>Harga: $15</p>
                    <button id="popupBtn" onclick="beli()" value="Caffe Latte">Beli Sekarang</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/produk/3.png" alt="Produk 3">
                <div class="item-content">
                    <h3>Tubruk</h3>
                    <p>Harga: $20</p>
                    <button id="popupBtn" onclick="beli()" value="Tubruk">Beli Sekarang</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/produk/4.png" alt="Produk 3">
                <div class="item-content">
                    <h3>Kopi Susu</h3>
                    <p>Harga: $20</p>
                    <button id="popupBtn" onclick="beli()" value="Kopi Susu">Beli Sekarang</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/produk/5.png" alt="Produk 3">
                <div class="item-content">
                    <h3>Expreso</h3>
                    <p>Harga: $20</p>
                    <button id="popupBtn" onclick="beli()" value="Expreso">Beli Sekarang</button>
                </div>
            </div>
        </div>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
    <div id="popup" class="popup">
      <h4 id="judul"></h4>

      <form id="purchaseForm">
        <label for="quantity">Jumlah:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>

        <label for="paymentMethod">Metode Pembayaran:</label>
        <select id="paymentMethod" name="paymentMethod" required>
          <option value="">Pilih metode pembayaran</option>
          <option value="CreditCard">Kartu Kredit</option>
          <option value="DebitCard">Kartu Debit</option>
          <option value="BankTransfer">Transfer Bank</option>
          <option value="Cash">Tunai</option>
        </select>
        <input type="submit" id="beli" value="Beli">
      </form>
    </div>
    <div class="overlay" id="overlay"></div>
    </section>
    <footer>
      <div class="kiri">
        <img src="asset/logo.png" alt="">
        <p>© Kopi Ketenangan All Rights Reserved 2024</p>
      </div>
      <div class="icon">
        <img class="lok" src="asset/icon/1.png" alt="a" width="30px" height="30px">
        <img class="hp" src="asset/icon/2.png" alt="a" width="30px" height="30px">
      </div>
      <div class="tengah">
        <h3>Costomer Center</h3>
        <p>Itn Malang</p>
        <p>JL. Raya Karanglo KM. 2, Tasikmadu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65153</p>
        <p>081234567890</p>
      </div>
      <div class="kanan">
        <h3>Consumer Complaints Service Contact Information</h3>
        <p>Directorate General of Consumer Protection and Trade Compliance, Ministry of Trade of the Republic of Indonesia</p>
        <p>WhatsApp Galih: 081234567890</p>
        <nav class="fot">
          <ul type="square">
            <li><img src="asset/icon/3.png" alt="1"></li>
            <li><img src="asset/icon/4.png" alt="2"></li>
            <li><img src="asset/icon/5.png" alt="3"></li>
            <li><img src="asset/icon/6.png" alt="4"></li>
          </ul>
        </nav>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
