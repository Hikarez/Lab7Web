<?= $this->include('template/admin_header'); ?>

<div class="container py-5" style="background-color: #2a0143; color: #f8f9fa;">
  <!-- Judul -->
  <div class="text-center mb-5">
    <h2 class="fw-bold text-white"><?= esc($title) ?></h2>
    <p class="text-light fs-5">Kelola artikel berita dengan dashboard yang modern dan informatif.</p>
  </div>

  <!-- Statistik -->
  <div class="row g-4 mb-5">
    <div class="col-md-6">
      <div class="p-4 rounded-4 shadow text-center" style="background-color: #7e22ce; color: #fff;">
        <h5 class="text-uppercase mb-2">📄 Total Artikel</h5>
        <p class="display-4 fw-bold"><?= esc($totalArtikel) ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-4 rounded-4 shadow text-center" style="background-color: #9333ea; color: #fff;">
        <h5 class="text-uppercase mb-2">📁 Total Kategori</h5>
        <p class="display-4 fw-bold"><?= esc($totalKategori) ?></p>
      </div>
    </div>
  </div>

  <!-- Grafik Artikel per Kategori -->
  <div class="card bg-dark border-0 shadow rounded-4 mb-5">
    <div class="card-body">
      <h4 class="card-title text-white mb-4">📊 Grafik Artikel per Kategori</h4>
      <canvas id="artikelChart" height="120"></canvas>
    </div>
  </div>

  <!-- Artikel Terbaru -->
  <div class="card bg-dark border-0 shadow rounded-4">
    <div class="card-body">
      <h4 class="card-title text-white mb-4">🕒 Artikel Terbaru</h4>
      <ul class="list-group list-group-flush">
        <?php foreach ($artikelTerbaru as $a): ?>
          <li class="list-group-item bg-transparent text-light border-bottom border-secondary">
            <div class="fw-semibold">📰 <?= esc($a['judul']) ?></div>
            <div class="text-muted small">🗓 <?= date('d M Y H:i', strtotime($a['created_at'])) ?></div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Chart JS -->
<script>
  Chart.register(ChartDataLabels);

  const ctx = document.getElementById('artikelChart').getContext('2d');
  const artikelChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($artikelPerKategori, 'nama_kategori')) ?>,
      datasets: [{
        label: 'Jumlah Artikel',
        data: <?= json_encode(array_column($artikelPerKategori, 'jumlah')) ?>,
        backgroundColor: '#c084fc', // ungu pastel
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: '#1e1b2e',
          titleColor: '#ffffff',
          bodyColor: '#e0e0e0'
        },
        datalabels: {
          anchor: 'end',
          align: 'top',
          color: '#ffffff',
          font: {
            weight: 'bold',
            size: 13
          }
        }
      },
      scales: {
        x: {
          ticks: { color: '#e0e0e0' },
          grid: { display: false }
        },
        y: {
          beginAtZero: true,
          ticks: { color: '#e0e0e0' },
          grid: { color: '#4c1d95' } // ungu gelap
        }
      }
    },
    plugins: [ChartDataLabels]
  });
</script>

<?= $this->include('template/admin_footer'); ?>
