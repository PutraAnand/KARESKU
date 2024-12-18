<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Karesku</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #ffb565;
            color: #fff;
            height: 100vh;
            position: fixed;
            transition: width 0.3s;
            overflow: hidden;
        }

        .sidebar.active {
            width: 80px;
        }

        .logo-details {
            display: flex;
            align-items: center;
            padding: 20px;
            font-size: 24px;
            color: #ffffff;
        }

        .logo-details i {
            font-size: 28px;
            margin-right: 10px;
        }

        .nav-links {
            list-style: none;
            padding: 10px 0;
        }

        .nav-links li {
            padding: 15px 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .nav-links li a {
            text-decoration: none;
            color: inherit;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .nav-links li:hover {
            background-color: #575757;
        }

        .nav-links li i {
            font-size: 22px;
            margin-right: 10px;
        }

        .nav-links li .links_name {
            transition: opacity 0.3s;
        }

        .sidebar.active .links_name {
            opacity: 0;
        }

        /* Header and Home section */
        .home-section {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s;
        }

        .home-section.active {
            margin-left: 80px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffb565;
            color: #fff;
            padding: 15px 20px;
            border-radius: 8px;
        }

        .sidebar-button {
            display: flex;
            align-items: center;
        }

        .sidebar-button i {
            font-size: 24px;
            cursor: pointer;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .sidebar-button i:hover {
            color: #ff8e43;
        }

        .profile-details {
            font-size: 18px;
        }

        /* Content */
        .home-content {
            margin-top: 20px;
        }

        .home-content h1 {
            font-size: 32px;
            color: #333;
        }

    </style>
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
