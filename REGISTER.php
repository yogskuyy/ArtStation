<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/Rgstyle.css">
  <style>
    body{
        background-image: url("/Asset/space.jpg");
        background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="masuk-proses.php" method="post" class="register-form">
      <h2>Register</h2>
      <div class="input-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="input-group">
        <input type="text" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="register">Register</button>
      </form>
  </div>
</body>
</html>
