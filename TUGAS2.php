<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArtStation-Home</title>
  <link rel="stylesheet" href="css/dbstyle.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <nav class="menu-container">
    <div class="logo">
      <img src="Asset/ARTSTATION (1920 x 1080 piksel).png" width="150px" height="70px"/>
      <input type="checkbox" id="menu-btn">
      <label for="menu-btn">
        <i class="material-icons large-icon">&#xe5d2;</i>
      </label>
    </div>
    <div class="menu" id="menu">
      <ul>
        <li><a href="TUGAS2.html">Home</a></li>
        <li><a href="#profile">Shop</a></li>
        <li><a href="#profile">Profile</a></li>
        <li><a href="admin/DashboardAdmin.php">Admin</a></li>
        <li class="login"><a id="login-btn">Login</a></li>
      </ul>
    </div>
  </nav>
  <section class="cari">
    <div class="konten">
      <div>
        <h1>Welcome to ArtStation</h2>
        <h1>Cari Seni Apa Kali Ini?</h1>
        <div class="search-container">
          <span class="search-icon"><i class="fas fa-search"></i></span>
          <input type="text" class="search-input" placeholder="Cari">
        </div>
      </div>
      <nav class="navbar">
        <a href="#">
          <img src="Asset/catergori/1.png" alt="Home">
          <p>Game</p>
        </a>
        <a href="#">
          <img src="Asset/catergori/2.png" alt="About">
          <p>Natural</p>
        </a>
        <a href="#">
          <img src="Asset/catergori/3.png" alt="Contact">
          <p>Animasi</p>
        </a>
        <a href="#">
          <img src="Asset/catergori/4.png" alt="ex">
          <p>Animal</p>
        </a>
        <a href="#">
          <img src="Asset/catergori/5.png" alt="Lainnya">
          <p>More</p>
        </a>
      </nav>
      
    </div>

  </section>
  <div class="carousel-container">
    <div class="carousel-slide" id="carouselSlide">
      <img src="Asset/c1.png" alt="Image 1">
      <img src="Asset/c2.png" alt="Image 2">
      <img src="Asset/c3.png" alt="Image 3">
    </div>
  </div>
  <button class="carousel-prev" id="prevBtn">&#10094;</button>
  <button class="carousel-next" id="nextBtn">&#10095;</button>
  <section class="hero">
    <div class="container">
      <h2>Galery</h2>
      <div class="container">
        <div class="gallery">
            <div class="post">
                <img src="Asset/1.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/2.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/3.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/4.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/5.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/6.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/7.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            <div class="post">
                <img src="Asset/8.png" alt="Image 1">
                <div class="likes">
                    <i class="fas fa-heart"></i>
                    <span>123</span>
                </div>
            </div>
            </div>
    </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2024 ArtStation. All rights reserved.</p>
    </div>
  </footer>
  <div class="popup" id="login-popup">
    <div class="popup-content">
        <form action="masuk-proses.php" class="log-form" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <input id = "email" name = "email" type="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input id = "password" name = "password" type="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login">Login</button>
            <p>If you don't have an account, please <a href="Register.php">register</a>.</p>
        </form>
        <button class="popup-close" onclick="closePopup()">X</button>
    </div>
</div>
<!-- <div class="popup">
  <form action="#" class="register-form">
    <h2>Register</h2>
    <div class="input-group">
      <input type="text" placeholder="Username" required>
    </div>
    <div class="input-group">
      <input type="password" placeholder="Password" required>
    </div>
    <button type="submit">Register</button>
    </form>
</div> -->
<script src="js/home.js"></script>
</body>
</html>