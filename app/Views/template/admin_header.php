<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'Admin Portal'; ?></title>

    <!-- Google Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        :root {
            --primary-bg: #f5f7fa;
            --secondary-bg: #ffffff;
            --accent: #8a2be2;
            --text-main: #2d3436;
            --text-muted: #636e72;
            --navbar-bg: #ffffff;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--primary-bg);
            margin: 0;
            padding: 0;
            color: var(--text-main);
        }

        /* Header */
        .header {
            padding: 40px 20px;
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            background: linear-gradient(135deg, #8a2be2, #e0d1f5);
            border-bottom: 4px solid var(--accent);
            color: var(--text-main);
            box-shadow: var(--shadow);
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: center;
            gap: 18px;
            background-color: var(--navbar-bg);
            padding: 14px 0;
            box-shadow: var(--shadow);
            border-bottom: 1px solid #dfe6e9;
        }

        .navbar a {
            color: var(--text-main);
            font-weight: 600;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .navbar a:hover,
        .navbar a.active {
            background-color: var(--accent);
            color: white;
        }

        /* Container */
        .container {
            max-width: 1500px;
            margin: 40px auto;
            background: var(--secondary-bg);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        .container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--accent);
            padding-bottom: 10px;
        }

        .container p {
            font-size: 15px;
            color: var(--text-muted);
        }

        /* Footer */
        footer {
            background: var(--navbar-bg);
            color: var(--text-muted);
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            margin-top: 60px;
            border-top: 4px solid var(--accent);
        }

        /* Article List */
        .article-list {
            padding: 30px 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .card-article {
            background-color: var(--secondary-bg);
            color: var(--text-main);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 25px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-article:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
        }

        .entry-header h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .entry-header h2 a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.3s;
        }

        .entry-header h2 a:hover {
            color: #8a2be2;
        }

        .kategori {
            font-size: 0.85em;
            color: var(--text-muted);
        }

        .entry-image img {
            max-width: 100%;
            height: auto;
            margin: 15px 0;
            border-radius: 10px;
            border: 1px solid #dfe6e9;
        }

        .entry-content p {
            color: var(--text-main);
            margin-bottom: 10px;
            font-size: 14.5px;
        }

        .read-more {
            display: inline-block;
            background-color: var(--accent);
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .read-more:hover {
            background-color: #8a2be2;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
            }

            .container {
                margin: 20px 10px;
                padding: 30px 20px;
            }

            .header {
                font-size: 26px;
                padding: 30px 10px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        📰 Admin Portal
    </div>

    <!-- Navigation -->
    <?php
    $uri = service('uri');
    $segment2 = $uri->getSegment(2);
    $segment3 = $uri->getSegment(3);
    ?>
    <nav class="navbar">
        <a href="<?= base_url('/admin/dashboard'); ?>" class="<?= ($segment2 == 'dashboard') ? 'active' : ''; ?>">
            Dashboard
        </a>
        <a href="<?= base_url('/admin/artikel'); ?>"
            class="<?= ($segment2 == 'artikel' && !$segment3) ? 'active' : ''; ?>">
            Artikel
        </a>
        <a href="<?= base_url('/admin/artikel/add'); ?>"
            class="<?= ($segment2 == 'artikel' && $segment3 == 'add') ? 'active' : ''; ?>">
            Tambah Artikel
        </a>
    </nav>

    <!-- Content -->
    <main class="container">
        <h2>Selamat Datang di Dashboard Admin</h2>
        <p>Kelola semua konten artikel berita dari satu tempat dengan tampilan yang bersih dan profesional.</p>
        <?= $this->renderSection('content') ?>
    </main>