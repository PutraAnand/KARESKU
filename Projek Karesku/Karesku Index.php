<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Karesku</title>
    <link rel="icon" href="assets/Logo.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="left-section">
                <img src="asset/Logo.png" alt="Karesku Logo" class="logo-icon">
            </div>
        <input type="text" placeholder="Search" class="search-bar">
            <div class="right-section">
                <a href="Karesku Login.php" class="btn_login">Log In</a>
                <a href="Karesku Register.php" class="btn_register">Register</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="banner">
            <img src="asset/banner.jpeg" alt="Banner">
        </div>

        <section class="info-section">
            <div class="info-card">
                <h2>Mau masak Apa hari Ini?</h2>
                <p>Melalui fitur pencarian di Karesku, kamu dapat menemukan resep berdasarkan bahan atau nama hidangan, memastikan kamu selalu mendapat inspirasi masak setiap harinya.</p>
            </div>
            <div class="info-image">
                <img src="asset/food.jpeg" alt="Food 1">
            </div>
        </section>

        <section class="info-section">
            <div class="info-card">
                <h2>Simpan Resep Kesukaanmu</h2>
                <p>Melalui fitur Simpan resep, kamu dapat menyimpan resep orang lain untuk dimasak di kemudian hari.</p>
            </div>
            <div class="info-image">
                <img src="asset/drink.jpeg" alt="Drink 1">
            </div>
        </section>
    </main>

    <!-- JavaScript untuk interaksi DOM -->
    <script>
        // Ambil elemen berdasarkan id
        const loginLink = document.getElementById('loginLink');
        const registerLink = document.getElementById('registerLink');
  
        // Tambahkan event listener untuk klik pada link Login
        loginLink.addEventListener('click', function(event) {
          event.preventDefault(); // Menghentikan aksi default link
          alert('Anda akan diarahkan ke halaman Login');
          window.location.href = 'Karesku Login.php'; // Arahkan pengguna ke halaman Login
        });
  
        // Tambahkan event listener untuk klik pada link Register
        registerLink.addEventListener('click', function(event) {
          event.preventDefault(); // Menghentikan aksi default link
          alert('Anda akan diarahkan ke halaman Register');
          window.location.href = 'Karesku Register.php'; // Arahkan pengguna ke halaman Register
        });
    </script>
</body>
</html>
