  @extends('frontend.main')
  @section('konten')
  <!-- Hero Section start -->
  <section class="hero" id="home">
    <!-- <div class="mask-container"> -->
    <div>
      <main class="content">
        <marquee><h1>SELAMAT DATANG</h1></marquee>
        {{-- <h1>Selamat datang <br> Koperasi Pemasaran <br><span>CKS Banjarnegara</span></h1> --}}
        <!-- <p style="color: aliceblue;">Koperasi Pemasaran Cipta Karya Sejahtera</p> -->
      </main>
    </div>
  </section>
 
<br> <br>
  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h2 class="text-center">Tentang Kami</h2>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
                  <img src="img/ketua.jpg" class="img-fluid rounded-circle mt-4" style="width: 250px; height: 250px" alt="Foto Ketua">
                </div>
                

                <div class="col-md-8 mt-4">
                  <h2>Ketua</h2>
                  <p>Nama: Akhmad Zaenal Mutaqin, S.Pd</p>
                  <p>Jabatan: Ketua Koperasi Cipta Karya Sejahtera</p>
                  <p>Siapa kami :</p>
                  <p class="p1"> Koperasi Pemasaran Cipta Karya Sejahtera adalah salah satu Koperasi Primer di Kabupaten
                    Banjarnegara. Koperasi ini didirikan pada tanggal 16 Februari 2021 dengan Badan Hukum Nomor AHU
                    0008928.AH.01.26.TAHUN 2021 dengan nama awal KOPERASI PEMASARAN CIPTA KARYA SEJAHTERA.

                    Dalam usianya yang ke 2 tahun Koperasi Pemasaran Cipta Karya Sejahtera telah menempatkan dirinya
                    sebagai salah satu pelaku bisnis yang berwatak sosial, saling bekerjasama dan saling meningkatkan
                    kualitas diri dengan motto “Mandiri Bersama, Sukses Bersama dan Sejahtera Bersama Anggota ”Dari Awal
                    berdiri sampai sekarang Koperasi Pemasaran Cipta Karya Sejahtera beraktivitas pada kemandirian yang
                    Hakiki, menuju sehat Organisasi, sehat Usaha dan sehat Manajemen. Secara perlahan tetapi pasti
                    melangkahkan kakinya berpijak pada Kesejahteraan semua anggota-anggotanya, saling berbagi dan selalu
                    membantu anggota baik dari segi Organisasi, usaha maupun permodalan dengan azas kekeluargaan.</p>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <h2>Visi & Misi</h2>
                  <p>Visi:</p>
                  <p>
                    Mewujudkan IMKM yang mempunyai daya saing, Tangguh dan mandiri
                  </p>
                  <p>Misi:</p>
                  <p> 1. Meningkatkan kualitas SDM anggota. <br>
                    2. Meningkatkan kualitas produk anggota. <br>
                    3. Meningkatkan kesejahteraan anggota. <br>
                    4. Mendistribusikan hasil produksi anggota.
                  </p>
                </div>
              </div>

              <div class="row">
                {{-- <div class="modal-footer">
                  <a href="galeri.php" class="btn btn-primary">Galeri Kegiatan CKS</a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Section end -->

  <!-- Menu Section start -->
  <section class="products" id="menu">
    <h2 style="color: #001B79;"><span>Produk</span> UKM</h2>
    <p>Kategori Produk yang tersedia di Koperasi CKS Banjarnegara</p>

    <div class="row">

      {{-- ini produk --}}
      @foreach ($kategori as $kategoris)
      <div class="product-card">
        <div class="product-icons" id="produk1">
          <a href="{{ $kategoris->url }}"><i data-feather="shopping-cart"></i></a>
           <a href="/kategori/{{ $kategoris->slug }}" id="shopping-cart-button" class="item-detail-button"><i data-feather="eye"></i></a> 
        </div>
        
        <div class="product-image">
          <img class="img-fluid" style="width: 100%; height: 400; object-fit: cover;" src="{{ asset('images/kategoriukm/'. $kategoris->foto) }}" alt="Product 1">
        </div>
        
        <div class="product-content">
          <h3>{{ $kategoris->nama }}</h3>
          <div class="product-stars">
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star"></i>
          </div>
          <!-- <div class="product-price">IDR 30K <span>IDR 55K</span></div> -->
        </div>
      </div>
      
      @endforeach
      {{-- end produk --}}

    </div>
  </section>
  <!-- Menu Section end -->

  <!-- Products Section start -->
  <section class="products" id="products">
    <h2 style="color: #001B79;"><span>Produk</span> Sahabat Kemasan</h2>
    <p>Produk yang tersedia di Sahabat Kemasan Banjarnegara</p>
    <div class="row">

      {{-- konten --}}
        @foreach ($kemasan as $kemasans)
        <div class="product-card">
          <div class="product-icons" id="produk1">
            <a href="{{ $kemasans->url }}"><i data-feather="shopping-cart"></i></a>
            <!-- <a href="#" id="shopping-cart-button" class="item-detail-button"><i data-feather="eye"></i></a> -->
          </div>
          
          <div class="product-image">
            <img class="img-fluid" style="width: 100%; height: 400; object-fit: cover;" src="images/kemasan/{{ $kemasans->foto }}" alt="Product">
          </div>
          
          <div class="product-content">
            <h3>{{ $kemasans->nama }}</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <!-- <div class="product-price">IDR 30K <span>IDR 55K</span></div> -->
          </div>
        </div>
        
      @endforeach

      {{-- end konten --}}

    </div>

  </section>
  <!-- Products Section end -->

  <!-- Contact Section start -->
  <!-- Contact Section start -->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>
    <p>Silahkan bila ada kendala maupun pertanyaan bisa hubungi kontak dibawah ini</p>

    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13003.892682710402!2d109.68739928815171!3d-7.400286735833128!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa93d6530c227%3A0x6614d10df186e4ed!2sGedung%20Dekranasda!5e0!3m2!1sid!2sid!4v1717491406291!5m2!1sid!2sid"
        width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

        <form id="contactForm">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" name="nama" placeholder="Nama" required>
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="tel" name="no_hp" placeholder="No Hp" pattern="[0-9]{12,}"
              title="Masukkan minimal 12 digit angka" required>
          </div>
          <div class="input-group">
            <i data-feather="message-circle"></i>
            <input type="text" name="pesanku" placeholder="Masukkan Pesan Anda" required>
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
      </form>
  
      <script>
          document.getElementById('contactForm').addEventListener('submit', function(event) {
              event.preventDefault(); // Mencegah form dikirim secara default
  
              // Ambil nilai dari form
              var nama = document.querySelector('input[name="nama"]').value;
              var email = document.querySelector('input[name="email"]').value;
              var no_hp = document.querySelector('input[name="no_hp"]').value;
              var pesan = document.querySelector('input[name="pesanku"]').value;
  
              // Buat URL WhatsApp
              var waNumber = "081268477296";
              var waUrl = `https://wa.me/${waNumber}?text=Nama: ${encodeURIComponent(nama)}%0AEmail: ${encodeURIComponent(email)}%0ANo HP: ${encodeURIComponent(no_hp)}%0APesan: ${encodeURIComponent(pesan)}`;
  
              // Redirect ke URL WhatsApp
              window.location.href = waUrl;
          });
  
          // Menginisialisasi feather icons
          feather.replace();
      </script>

    </div>
    <br>
    <div style="text-align: center;">
      <ul>
        <strong>Alamat:</strong> Jl. Dipayuda, Kutabanjarnegara, Krandegan, Kec. Banjarnegara, Kab. Banjarnegara, Jawa
        Tengah</li><br>
        <strong>Email:</strong> koperasicks@gmail.com</li><br>
        <strong>Telepon:</strong> +62 852-2990-8104</li>
      </ul>
    </div>
  </section>
  <!-- Contact Section end -->

  <!-- Contact Section end -->



  <!-- Modal Box Item Detail start -->
  <div class="modal" id="item-detail-modal">
    <div class="modal-container">
      <a href="#" class="close-icon"><i data-feather="x"></i></a>

      <div class="modal-content" id="produk1">
        <img src="img/products/1.jpg" alt="Product 1">
        <div class="product-content">
          <h3>Product 1</h3>
          <p style="color: #000;">Ini Produk1</p>
          <div class="product-stars">
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star"></i>
          </div>
          <div class="product-price">IDR 30K <span>IDR 55K</span></div>
          <a href="https://wa.me/+6285229908104"><i data-feather="shopping-cart"></i> <span>Pesan sekarang</span></a>
        </div>
      </div>

    </div>
  </div>
  <!-- Modal Box Item Detail end -->
  @endsection