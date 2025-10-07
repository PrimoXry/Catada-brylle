<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Directory - Playground Theme</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* --- BODY BACKGROUND --- */
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to top, #c8f7ff 0%, #a6e4ff 100%);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* --- TOP NAVIGATION --- */
    .topnav {
      width: 100%;
      background: #fffbea;
      border-bottom: 5px solid #f9ca24;
      padding: 20px;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    .topnav h1 {
      margin: 0 0 10px;
      color: #2c3e50;
      font-size: 1.8rem;
    }

    /* --- SEARCH BAR --- */
    .search {
      padding: 8px 12px;
      border-radius: 20px;
      border: 2px solid #27ae60;
      outline: none;
      width: 220px;
      transition: 0.3s;
    }

    .search:focus {
      box-shadow: 0 0 8px #27ae60;
    }

    .btn {
      background: #74b9ff;
      border: none;
      padding: 8px 15px;
      border-radius: 20px;
      color: white;
      font-weight: bold;
      margin-left: 5px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn:hover {
      background: #0884e4;
    }

    /* --- TABLE STYLES --- */
    table {
      border-collapse: collapse;
      width: 90%;
      max-width: 900px;
      margin: 25px auto;
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      position: relative;
      z-index: 1;
    }

    table th, table td {
      padding: 12px;
      text-align: center;
      border: none;
    }

    table th {
      background: #f9ca24;
      color: #2c3e50;
      font-size: 1rem;
    }

    table tr:nth-child(even) {
      background: #fef9e7;
    }

    table tr:hover {
      background: #fdebd0;
    }

    /* --- PAGINATION --- */
    .pagination {
      margin: 20px auto;
      text-align: center;
      display: flex;
      justify-content: center;
      gap: 8px;
      flex-wrap: wrap;
    }

    .pagination a,
    .pagination strong,
    .pagination span {
      display: inline-block;
      padding: 8px 14px;
      border-radius: 20px;
      background: #74b9ff;
      color: white;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
      border: 2px solid #0984e3;
    }

    .pagination a:hover {
      background: #0984e3;
    }

    .pagination strong {
      background: #f9ca24;
      color: #2c3e50;
      border-color: #e1b12c;
    }

    .pagination span {
      background: #dfe6e9;
      color: #636e72;
      border-color: #b2bec3;
      cursor: not-allowed;
    }

    /* --- LOGOUT BUTTON (BOTTOM) --- */
    .logout-container {
      margin-top: auto;
      margin-bottom: 30px;
      text-align: center;
    }

    .btn-logout {
      display: inline-block;
      padding: 12px 28px;
      border-radius: 25px;
      font-weight: bold;
      text-decoration: none;
      background: #ff6b6b;
      color: white;
      border: 2px solid #c0392b;
      transition: all 0.3s ease;
      font-size: 1.1rem;
    }

    .btn-logout:hover {
      background: #c0392b;
      color: #fffbea;
      box-shadow: 0 4px 12px rgba(192,57,43,0.5);
      transform: scale(1.05);
    }
  </style>
</head>

<body>

  <!-- Header / Top Navigation -->
  <div class="topnav">
    <h1><i class="fa-solid fa-school"></i> 🐶 Pet Directory</h1>

    <form method="get" action="<?=site_url('/auth/dashboard')?>" style="margin-top:10px;">
      <input 
        type="text" 
        name="q" 
        value="<?=html_escape($_GET['q'] ?? '')?>" 
        placeholder="Search pet..." 
        class="search">
      <button type="submit" class="btn">
        <i class="fa fa-search"></i> Search
      </button>
    </form>
  </div>

  <!-- Table Display -->
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($user)): ?>
        <?php foreach($user as $users): ?>
          <tr>
            <td><?=html_escape($users['id']);?></td>
            <td><?=html_escape($users['name']);?></td>
            <td><?=html_escape($users['type']);?></td>
            <td><?=html_escape($users['age']);?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" style="font-style:italic; color:#636e72;">No Pet found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Pagination -->
  <div class="pagination">
    <?php if (!empty($page)) echo $page; ?>
  </div>

  <!-- Logout Button at Bottom -->
  <div class="logout-container">
    <a href="<?=site_url('auth/logout');?>" class="btn-logout">
      <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
  </div>

</body>
</html>
