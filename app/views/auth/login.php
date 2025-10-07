<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Pet Management</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    .login-container {
      max-width: 400px;
      margin: 80px auto;
      background: #fff9c4;
      border: 4px solid #f9ca24;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      padding: 40px 30px;
      position: relative;
      text-align: center;
    }

    .login-container h2 {
      font-size: 32px;
      color: #2c3e50;
      margin-bottom: 20px;
      text-shadow: 1px 1px #ffeaa7;
    }

    .login-container .input-field {
      width: 90%;
      padding: 12px 15px;
      border-radius: 25px;
      border: 2px solid #e1b12c;
      margin-bottom: 15px;
      font-size: 16px;
      font-family: "Comic Sans MS", cursive, sans-serif;
      outline: none;
      transition: 0.3s;
    }
    .login-container .input-field:focus {
      border-color: #f9ca24;
      box-shadow: 0 0 8px #ffeaa7;
    }

    .btn-login {
      background: #74b9ff;
      border: 3px solid #0984e3;
      color: white;
      font-size: 18px;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    .btn-login:hover {
      background: #0984e3;
      transform: scale(1.08);
    }

    .login-footer {
      margin-top: 20px;
      color: #2c3e50;
    }

    .login-footer a {
      color: #00b894;
      font-weight: bold;
      text-decoration: none;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    .error-box {
      background: #ff7675;
      color: #fff;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 15px;
      font-weight: bold;
    }

    .pw-toggle {
      position: relative;
    }

    .pw-toggle i {
      position: absolute;
      right: 30px;
      top: 38%;
      color: #f0932b;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .login-container {
        width: 90%;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="hero">
    <h1>🐾 Welcome Back!</h1>
    <p>Login to your pet dashboard and continue your journey with your furry friends.</p>
  </div>

  <div class="login-container">
    <h2><i class="fa-solid fa-paw"></i> Login</h2>

    <?php if(!empty($errors)): ?>
      <div class="error-box">
        <?php foreach($errors as $error): ?>
          <div><?= htmlspecialchars($error) ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="post">
      <input type="text" name="username" placeholder="Username" required class="input-field">

      <div class="pw-toggle">
        <input type="password" name="password" id="password" placeholder="Password" required class="input-field">
        <i class="fa-solid fa-eye" id="togglePw"></i>
      </div>

      <button type="submit" class="btn-login">
        <i class="fa-solid fa-right-to-bracket"></i> Login
      </button>
    </form>

    <div class="login-footer">
      Don’t have an account? 
      <a href="<?= site_url('/') ?>">Register here</a>
    </div>
  </div>

  <script>
    const pwInput = document.getElementById('password');
    const togglePw = document.getElementById('togglePw');
    togglePw.addEventListener('click', () => {
      const type = pwInput.type === 'password' ? 'text' : 'password';
      pwInput.type = type;
      togglePw.classList.toggle('fa-eye');
      togglePw.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
