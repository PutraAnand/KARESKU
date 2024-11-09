<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Karesku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/register.css" />

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
    <div class="register-container">
        <div class="close-button">×</div>
        <div class="logo">
            <img src="asset/Logo.png" alt="Logo" class="logo-icon">
            <h1>Karesku</h1>
        </div>
        <form class="register-form" onsubmit="event.preventDefault(); showSnackbar();">
            <div class="input-container">
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-container">
                <input type="email" placeholder="Your Email" required>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Password" required>
                <span class="show-password">👁️</span>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Konfirmasi password" required>
                <span class="show-password">👁️</span>
            </div>
            <button type="submit" class="register-button">Create Account</button>
        </form>
    </div>

    <div id="snackbar">Register successful!</div>

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