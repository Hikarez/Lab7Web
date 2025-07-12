<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'WEB PORTAL BERITA'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #6a0dad;
      --accent-color: #b19cd9;
      --bg-light: #f9f9fb;
      --bg-dark: #ffffff;
      --text-dark: #1e1e2f;
      --text-accent: #6a0dad;
      --shadow: 0 4px 20px rgba(106, 13, 173, 0.15);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-dark);
    }

    #container {
      max-width: 1300px;
      margin: 40px auto;
      background: var(--bg-dark);
      border-radius: 16px;
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    a {
      text-decoration: none;
      color: var(--primary-color);
    }

    a:hover {
      color: #8a2be2;
    }

    header {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      color: white;
      padding: 50px 20px;
      text-align: center;
      border-bottom: 4px solid white;
    }

    header h1 {
      font-size: 2.8rem;
      font-weight: 700;
      text-transform: uppercase;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
    }

    nav {
      background: #f1e6ff;
      display: flex;
      justify-content: center;
      padding: 12px 10px;
      gap: 20px;
      border-bottom: 1px solid #e0d1f5;
    }

    nav a {
      padding: 10px 18px;
      border-radius: 8px;
      font-weight: 600;
      color: var(--text-dark);
      transition: background 0.3s ease, color 0.3s ease;
    }

    nav a.active,
    nav a:hover {
      background: var(--primary-color);
      color: #fff;
    }

    #wrapper {
      display: flex;
      flex-wrap: wrap;
      padding: 40px 30px;
      gap: 30px;
    }

    #main {
      flex: 3;
      min-width: 60%;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: var(--shadow);
    }

    #main h2,
    #main h3 {
      color: var(--primary-color);
    }

    #main a {
      color: var(--primary-color);
    }

    #main a:hover {
      color: #8a2be2;
    }

    #sidebar {
      flex: 1;
      min-width: 300px;
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(12px);
      border: 1px solid #e0d1f5;
      border-radius: 12px;
      padding: 25px;
      box-shadow: var(--shadow);
    }

    .widget-box {
      margin-bottom: 20px;
    }

    .widget-box .title {
      font-size: 1.3em;
      margin-bottom: 10px;
      font-weight: 600;
      color: var(--primary-color);
      border-bottom: 2px solid var(--accent-color);
      padding-bottom: 5px;
    }

    .artikel-terkini-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .artikel-terkini-list li {
      margin-bottom: 10px;
      padding: 12px;
      background: #f4effc;
      border-left: 4px solid var(--primary-color);
      border-radius: 6px;
      transition: 0.3s ease;
    }

    .artikel-terkini-list li:hover {
      background: #ebdfff;
    }

    .artikel-terkini-list li a {
      font-weight: 500;
      color: var(--text-dark);
    }

    footer {
      background: #f1e6ff;
      text-align: center;
      padding: 20px;
      font-size: 0.9em;
      color: #5c5470;
      border-top: 2px solid var(--accent-color);
    }

    @media (max-width: 768px) {
      #wrapper {
        flex-direction: column;
      }

      nav {
        flex-direction: column;
        gap: 10px;
      }

      #main,
      #sidebar {
        min-width: 100%;
      }
    }
  </style>
</head>

<body>
  <div id="container">
    <header>
      <h1>WEB PORTAL BERITA</h1>
    </header>
    <nav>
      <?php
      $currentPath = service('uri')->getPath();
      $navLinks = [
        'Home' => '/',
        'Artikel' => '/artikel',
        'About' => '/about',
        'Kontak' => '/contact',
      ];

      foreach ($navLinks as $text => $path) {
        $isActive = ($currentPath === $path || ($path === '/' && $currentPath === ''));
        if ($path === '/artikel' && strpos($currentPath, '/artikel') === 0 && $currentPath !== '/') {
          $isActive = true;
        }
      ?>
        <a href="<?= base_url($path); ?>" class="<?= $isActive ? 'active' : ''; ?>">
          <?= $text; ?>
        </a>
      <?php } ?>
    </nav>

    <section id="wrapper">
      <section id="main">