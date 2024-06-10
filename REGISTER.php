<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/Rgstyle.css">
  <style>
    /* Rgstyle.css */
    body {
      font-family: 'Arial', sans-serif;
      background-image: url("/Asset/space.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      width: 100%;
      text-align: center;
      border: 1px solid rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group input {
      width: calc(100% - 1px);
      padding: 12px;
      margin: 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .input-group input:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    button {
      background: linear-gradient(135deg, #007bff, #0056b3);
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background: linear-gradient(135deg, #0056b3, #004494);
      transform: scale(1.05);
    }

    button:focus {
      outline: none;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    @media (max-width: 600px) {
      .container {
        padding: 30px;
      }

      .input-group input {
        font-size: 14px;
      }

      button {
        font-size: 14px;
      }
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
