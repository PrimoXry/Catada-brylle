<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Pet Management</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
      font-family: "Comic Sans MS", cursive, sans-serif;
      text-align: center;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    .hero {
      margin-top: 40px;
      color: #2c3e50;
    }

    .hero h1 {
      font-size: 36px;
      text-shadow: 2px 2px #fff;
    }

    .hero p {
      font-size: 18px;
      margin-bottom: 40px;
    }

    .register-container {
      max-width: 420px;
      margin: auto;
      background: #fff9c4;
      border: 4px solid #f9ca24;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      padding: 40px 30px;
      text-align: center;
    }

    .register-container h2 {
      font-size: 30px;
      color: #2c3e50;
      margin-bottom: 20px;
      text-shadow: 1px 1px #ffeaa7;
    }

    .input-field {
      width: 90%;
      padding: 12px 15px;
      border-radius: 25px;
      border: 2px solid #e1b12c;
      margin-bottom: 15px;
      font-size: 16px;
      outline: none;
      transition: 0.3s;
    }

    .input-field:focus {
      border-color: #f9ca24;
      box-shadow: 0 0 8px #ffeaa7;
    }

    select.input-field {
      background: white;
    }

    .btn-register {
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

    .btn-register:hover {
      background: #0984e3;
      transform: scale(1.08);
    }

    .register-footer {
      margin-top: 20px;
      color: #2c3e50;
    }

    .register-footer a {
      color: #00b894;
      font-weight: bold;
      text-decoration: none;
    }

    .register-footer a:hover {
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

    #pwHelp {
      font-size: 12px;
      color: #d63031;
      margin-top: -5px;
      margin-bottom: 10px;
    }

    @media (max-width: 600px) {
      .register-container {
        width: 90%;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="hero">
    <h1>🐾 Join the Pet Family!</h1>
    <p>Create an account and start managing your adorable furry friends!</p>
  </div>

  <div class="register-container">
    <h2><i class="fa-solid fa-paw"></i> Register</h2>

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
      <p id="pwHelp">At least 8 characters with uppercase, lowercase, number & symbol.</p>

      <div class="pw-toggle">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required class="input-field">
        <i class="fa-solid fa-eye" id="toggleConfirm"></i>
      </div>

      <select name="role" required class="input-field">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit" class="btn-register">
        <i class="fa-solid fa-scroll"></i> Register
      </button>
    </form>

    <div class="register-footer">
      Already have an account?
      <a href="<?= site_url('auth/login') ?>">Login here</a>
    </div>
  </div>

  <script>
    const pwInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirm_password');
    const togglePw = document.getElementById('togglePw');
    const toggleConfirm = document.getElementById('toggleConfirm');
    const pwHelp = document.getElementById('pwHelp');

    const pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/;

    togglePw.addEventListener('click', () => {
      const type = pwInput.type === 'password' ? 'text' : 'password';
      pwInput.type = type;
      togglePw.classList.toggle('fa-eye');
      togglePw.classList.toggle('fa-eye-slash');
    });

    toggleConfirm.addEventListener('click', () => {
      const type = confirmInput.type === 'password' ? 'text' : 'password';
      confirmInput.type = type;
      toggleConfirm.classList.toggle('fa-eye');
      toggleConfirm.classList.toggle('fa-eye-slash');
    });

    pwInput.addEventListener('input', () => {
      if (pwRegex.test(pwInput.value)) {
        pwHelp.textContent = '✅ Password meets requirements.';
        pwHelp.style.color = '#00b894';
      } else {
        pwHelp.textContent = '❌ Must include uppercase, lowercase, number & symbol.';
        pwHelp.style.color = '#d63031';
      }
    });
  </script>
</body>
</html>
