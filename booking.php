<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Studio Musik Bintang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f7f9fc;
    }

    header {
      background-color: #0c2d57;
      color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-left: 1rem;
      font-weight: bold;
    }

    nav a.admin-login {
      background-color: #1976d2;
      padding: 6px 16px;
      border-radius: 25px;
      color: white;
      margin-left: 1rem;
    }

    nav a.admin-login:hover {
      background-color: #0d47a1;
    }

    nav a:not(.admin-login):hover {
      border-bottom: 2px solid white;
      padding-bottom: 2px;
      transition: all 0.2s ease;
    }


    .hero-image {
      background-image: url('/foto/studio.jpeg');
      background-size: cover;
      background-position: center;
      height: 400px;
      position: relative;
      border-radius: 0 0 30px 30px;
      overflow: hidden;
    }
    .hero-overlay {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
      padding: 0 20px;
      text-align: center;
      background-color: rgba(0,0,0,0.4);
    }

    .hero-overlay h1 {
      font-size: 2.8rem;
      margin-bottom: 10px;
    }

    .hero-overlay p {
      font-size: 1.2rem;
    }

    .hero-subtitle {
      display: inline-block;
      background-color: white;     /* latar putih */
      color: #000;                 /* teks hitam */
      padding: 8px 16px;           /* ruang dalam */
      border-radius: 8px;          /* sudut melengkung */
      font-weight: 500;
      font-size: 1.1rem;
      margin-top: 10px;
    }

    section {
      padding: 60px 20px;
      text-align: center;
    }

    section h2 {
      color: #0c2d57;
      font-size: 1.8rem;
      margin-bottom: 10px;
    }

    section p {
      font-size: 1.1rem;
      color: #333;
    }

    button {
      background-color: #4d94ff;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 30px;
      font-size: 1rem;
      margin-top: 20px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0d47a1;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.7);
    }

    .modal-content {
      background: #ffffff;
      margin: 5% auto;
      padding: 30px 20px;
      border-radius: 20px;
      width: 90%;
      max-width: 500px;
      color: #2c3e50;
      box-shadow: 0 0 30px rgba(0,0,0,0.2);
    }

    .modal-content h3 {
      margin-bottom: 20px;
      color: #0c2d57;
    }

    .modal-content input,
    .modal-content textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 1rem;
    }

    .modal-content button {
      width: 100%;
      padding: 12px;
      border-radius: 25px;
      font-size: 1rem;
      background-color: #1976d2;
      color: white;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }

    .modal-content button:hover {
      background-color: #0d47a1;
    }

    .close {
      float: right;
      font-size: 1.5rem;
      cursor: pointer;
      color: #999;
    }

    #receiptContent {
      background: #f4f6f9;
      padding: 1rem;
      border-radius: 10px;
      margin-top: 10px;
      color: #333;
      white-space: pre-line;
    }

    #noteCancellation {
      margin-top: 10px;
      color: #777;
      font-size: 0.9rem;
    }

    .floating-whatsapp img {
      width: 50px;
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1001;
    }

    footer {
      background-color: #0c2d57;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
    }

    .booking-container {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 30px;
    }

    .booking-box {
      background-color: white;
      border-radius: 16px;
      padding: 30px 20px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 280px;
      text-align: center;
    }

    .booking-box button {
      width: 100%;
    }

    .tentang-kami {
      background-color: #f9f9f9;
      padding: 60px 20px;
      text-align: center;
    }

    .tentang-kami .container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

  </style>
</head>
<body>

<header>
  <h1><i class="fa-solid fa-headphones-simple"></i> Studio Musik Bintang</h1>
  <nav>
    <a href="#beranda">Beranda</a>
    <a href="#sewa">Sewa</a>
    <a href="#tentang">Tentang</a>
    <a href="/admin/login" class="admin-login"><i class="fa-solid fa-lock"></i> Login Admin</a>
  </nav>
</header>

<section class="hero-image">
  <div class="hero-overlay">
    <h1 id="greeting"></h1>
      <script>
        const hour = new Date().getHours();
        let greeting;

        if (hour < 12) greeting = "Good Morning!";
        else if (hour < 18) greeting = "Good Afternoon!";
        else greeting = "Good Evening!";

        document.getElementById("greeting").textContent = greeting;
      </script>
    <p class="hero-subtitle">Temukan inspirasi dan suara terbaik di Studio Musik Bintang</p>
  </div>
</section>

<section id="beranda" class="relative bg-black text-white py-28 px-6 overflow-hidden">
  <div class="absolute inset-0 bg-[url('/img/studio-bg.jpg')] bg-cover bg-center opacity-20"></div>
  
  <div class="relative max-w-5xl mx-auto text-center">
    <h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-6">Studio Rekaman & Podcast Berkualitas</h2>
    <p class="text-lg md:text-xl text-gray-200 mb-4">
      Hadir dengan desain modern dan akustik yang presisi, studio kami adalah tempat terbaik untuk kamu yang ingin hasil audio profesional.
    </p>
    <p class="text-base md:text-lg text-gray-400 max-w-3xl mx-auto">
      Cocok untuk musisi, podcaster, content creator, hingga voice over artist yang ingin membawa karyanya ke level selanjutnya. Lengkap dengan peralatan high-end dan suasana yang bikin nyaman.
    </p>
  </div>
</section>



<section id="sewa">

    <p style="margin-bottom: 20px; font-size: 1rem; color: #444;">
Siap buat ngisi ruangan dengan karya kamu? Yuk mulai di sini 👇
</p>

    <div class="booking-container">
    <div class="booking-box">
      <h3><i class="fa-solid fa-calendar-plus"></i> Booking Sekarang</h3>
      <p>Rp40.000 / sesi (1 jam)</p>
      <button onclick="openModal()">Booking Sekarang</button>
    </div>
    <div class="booking-box">
      <h3><i class="fa-solid fa-clock"></i> Cek Jadwal</h3>
      <p>Lihat ketersediaan waktu sebelum booking</p>
      <a href="/booking/cekjadwal" style="text-decoration: none;">
        <button style="background-color: #4d94ff;">Cek Jadwal</button>
      </a>
    </div>
  </div>
</section>

<section class="tentang-kami">
  <div class="container">
    <h2>Tentang Kami</h2>
    <p>Kami adalah studio musik yang menyediakan tempat nyaman untuk latihan, rekaman, dan berkarya. Dengan fasilitas lengkap dan suasana asik, kami siap nemenin kamu nge-jam sepuasnya.</p>
  </div>
</section>



<!-- Modal Form -->
<div id="bookingModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3><i class="fa-solid fa-calendar-plus"></i> Form Booking</h3>
    <form id="bookingForm">
      <input type="text" id="nama" placeholder="Nama Lengkap" required />
      <input type="email" id="email" placeholder="Email (gmail/yahoo)" required />
      <input type="tel" id="telp" placeholder="Nomor Telepon" required />
      <input type="date" id="tanggal" required />
      <input type="time" id="startTime" required />
      <input type="number" id="sesi" min="1" value="1" required />
      <textarea id="catatan" rows="3" placeholder="Catatan (opsional)"></textarea>
      <button type="submit">Kirim Booking</button>
    </form>
  </div>
</div>

<!-- Modal Struk -->
<div id="receiptModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeReceipt()">&times;</span>
    <h3><i class="fa-solid fa-receipt"></i> Struk Booking</h3>
    <div id="receiptContent"></div>
    <div id="noteCancellation">
      <strong>Catatan:</strong> Jika ingin membatalkan pemesanan, harap hubungi lewat WhatsApp beserta foto struknya.
    </div>
    <button onclick="downloadPDF()">Download PDF</button>
  </div>
</div>

<a class="floating-whatsapp" href="https://wa.me/6285156948130" target="_blank">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Chat WhatsApp" />
</a>

<footer>&copy; 2025 Studio Musik Bintang. Musik untuk Semua.</footer>

<script>
  const bookingModal = document.getElementById("bookingModal");
  const receiptModal = document.getElementById("receiptModal");
  const form = document.getElementById("bookingForm");

  function openModal() { bookingModal.style.display = "block"; }
  function closeModal() { bookingModal.style.display = "none"; }
  function closeReceipt() { receiptModal.style.display = "none"; }

  window.onclick = function(e) {
    if (e.target == bookingModal) closeModal();
    if (e.target == receiptModal) closeReceipt();
  }

  form.onsubmit = async function(e) {
    e.preventDefault();
    const nama = document.getElementById("nama").value;
    const email = document.getElementById("email").value;
    const telp = document.getElementById("telp").value;
    const tanggal = document.getElementById("tanggal").value;
    const mulai = document.getElementById("startTime").value;
    const sesi = parseInt(document.getElementById("sesi").value);
    const selesai = hitungSelesai(mulai, sesi);
    const catatan = document.getElementById("catatan").value;

    if (!/@(gmail\.com|yahoo\.com)$/.test(email)) {
      alert("Hanya menerima email gmail.com atau yahoo.com!");
      return;
    }

    const cekRes = await fetch("/cek_booking", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ tanggal, mulai, selesai })
    });

    const cekResult = await cekRes.json();
    if (cekResult.bentrok) {
      alert("Waktu booking bentrok dengan jadwal lain. Silakan pilih waktu lain.");
      return;
    }

    const response = await fetch("/simpan_booking", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ nama, email, telp, tanggal, mulai, selesai, sesi, total: 40000 * sesi, catatan })
    });

    const result = await response.json();
    if (result.status === "success") {
      const struk = 🟣 STRUK BOOKING 🟣\nNama     : ${nama}\nEmail    : ${email}\nTelepon  : ${telp}\nTanggal  : ${tanggal}\nMulai    : ${mulai}\nSelesai  : ${selesai}\nSesi     : ${sesi}\nTotal    : Rp${(40000 * sesi).toLocaleString()}\nCatatan  : ${catatan || '-'};
      document.getElementById("receiptContent").textContent = struk;
      closeModal();
      receiptModal.style.display = "block";
    } else {
      alert("Gagal menyimpan: " + result.message);
    }
  };

  function hitungSelesai(mulai, sesi) {
    let [jam, menit] = mulai.split(":" ).map(Number);
    jam += sesi;
    if (jam >= 24) jam -= 24;
    return ${jam.toString().padStart(2, "0")}:${menit.toString().padStart(2, "0")};
  }

  function downloadPDF() {
    const doc = new window.jspdf.jsPDF();
    doc.text(document.getElementById("receiptContent").textContent, 10, 10);
    doc.save("struk-booking.pdf");
  }
</script>

</body>
</html>