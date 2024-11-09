<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Karesku</title>
    <link rel="stylesheet" href="css/Akun.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-restaurant"></i>
            <span class="logo_name">Karesku</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class="bx bx-home"></i>
                    <span class="links_name">Beranda</span>
                </a>
            </li>
            <li>
                <a href="Akun/Resep Disimpan.php">
                    <i class="bx bx-bookmark"></i>
                    <span class="links_name">Resep Disimpan</span>
                </a>
            </li>
            <li>
                <a href="Akun/Tambah Resep.php">
                    <i class="bx bx-plus"></i>
                    <span class="">Tambahkan Resep</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Keluar</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details">
                <span class="admin_name">Waluyo</span>
            </div>
        </nav>
        <div class="home-content">
            <h1>Selamat Datang Waluyo</h1>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        let homeSection = document.querySelector(".home-section");

        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            homeSection.classList.toggle("active");
            sidebarBtn.classList.toggle("bx-menu-alt-right");
            sidebarBtn.classList.toggle("bx-menu");
        };
    </script>
</body>
</html>
