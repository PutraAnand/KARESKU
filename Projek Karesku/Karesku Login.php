<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Karesku</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/login.css">

    <style>
        /* CSS snackbar */
        #snackbar {
          visibility: hidden;
          min-width: 250px;
          background-color: #333;
          color: #fff;
          text-align: center;
          border-radius: 4px;
          padding: 16px;
          position: fixed;
          z-index: 1;
          left: 50%;
          bottom: 30px;
          font-size: 16px;
          transform: translateX(-50%);
        }
  
        /* Show Snack bar */
        #snackbar.show {
          visibility: visible;
          animation: fadeInOut 3s ease-in-out;
        }
  
        /* animasi Snackbar */
        @keyframes fadeInOut {
          0%, 100% { opacity: 0; }
          10%, 90% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="back-button">←</div>
        <div class="logo">
            <img src="asset/Logo.png" alt="Logo" class="logo-icon">
        </div>
        <div>
            <p>
                Eksplorasi Dunia Resep Dengan Menyenangkan
            </p>
        </div>
        <form class="login-form" onsubmit="event.preventDefault(); showSnackbar();">
            <div class="input-container">
                <input type="text" placeholder="Email/Username" required>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Kata Sandi" required>
                <span class="show-password">show</span>
            </div>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <p>Belum punya akun Karesku? <a href="Karesku Register.php">Daftar</a></p>
    </div>

    <div id="snackbar">Login successful!</div>

    <!-- js show snack bar -->
    <script>
      function showSnackbar() {
        // get sncakbar div
        const snackbar = document.getElementById("snackbar");
        
        // add sho class sncakbar
        snackbar.classList.add("show");
        
        // Timer snackbar
        setTimeout(function(){
          snackbar.classList.remove("show");
        }, 3000);
      }
    </script>
</body>
</html>
