<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Studio Musik Bintang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #03045e, #0077b6, #90e0ef);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: white;
      width: 850px;
      max-width: 95%;
      display: flex;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(0, 0, 50, 0.3);
      overflow: hidden;
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .left {
      flex: 1;
      background: #caf0f8;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .left img {
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
    }

    .right {
      flex: 1;
      padding: 40px 30px;
      background: #fff;
    }

    .right h2 {
      text-align: center;
      color: #0077b6;
      margin-bottom: 25px;
      font-size: 26px;
    }

    .right h2 i {
      margin-right: 8px;
      color: #00b4d8;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      color: #333;
      font-weight: 600;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 2px solid #90e0ef;
      border-radius: 10px;
      margin-bottom: 15px;
      font-size: 16px;
      background-color: #f0f8ff;
    }

    input:focus {
      border-color: #0077b6;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #0077b6;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #023e8a;
    }

    .secondary-btn {
      background: #48cae4;
      margin-top: 12px;
    }

    .secondary-btn:hover {
      background: #00b4d8;
    }

    .secondary-btn i {
      margin-right: 6px;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .left, .right {
        width: 100%;
      }

      .right {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="left">
    <img src="<?= base_url('foto/ilustrasi-login.jpg') ?>" alt="Ilustrasi Login Studio Musik">
  </div>
  <div class="right">
    <h2><i class="fa-solid fa-music"></i> Login Admin Studio Musik</h2>
    <form method="post" action="<?= site_url('admin/login/auth') ?>">
      <label for="username"><i class="fa-solid fa-user"></i> Username</label>
      <input type="text" name="username" placeholder="Masukkan username" required>

      <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
      <input type="password" name="password" placeholder="Masukkan password" required>

      <button type="submit"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
    </form>

    <!-- Tombol kembali ke halaman utama -->
    <div style="margin-top: 20px;">
  <form action="<?= base_url('booking') ?>" method="get" style="display: inline;">
    <button type="submit" class="admin-login">
      <i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Utama
    </button>
  </form>
</div>



</body>
</html>
