<div class="widget-box">
    <h3 class="title">📰 Artikel Terkini</h3>
    <ul class="artikel-terkini-list">
        <?php foreach ($artikel as $row): ?>
            <li>
                <a href="<?= base_url('/artikel/' . $row['slug']) ?>">
                    <i class="fas fa-chevron-right me-2"></i> <?= $row['judul'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
