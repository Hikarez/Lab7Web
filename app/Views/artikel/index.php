<?= $this->include('template/header'); ?>

<div class="article-list container">
    <?php if ($artikel): ?>
        <?php foreach ($artikel as $row): ?>
            <article class="entry card-article">
                <div class="entry-header">
                    <h2>
                        <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
                            <?= esc($row['judul']); ?>
                        </a>
                    </h2>
                    <p class="kategori">Kategori: <span><?= esc($row['nama_kategori']); ?></span></p>
                </div>

                <?php if (!empty($row['gambar'])): ?>
                    <div class="entry-image">
                        <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>">
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <p><?= esc(substr($row['isi'], 0, 200)); ?>...</p>
                    <a href="<?= base_url('/artikel/' . $row['slug']); ?>" class="read-more">Baca Selengkapnya &rarr;</a>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <article class="entry card-article">
            <h2>Belum ada data.</h2>
        </article>
    <?php endif; ?>
</div>

<?= $this->include('template/footer'); ?>
