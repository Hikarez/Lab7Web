<?= $this->include('template/admin_header'); ?>

<div class="form-wrapper container my-5">
    <h2 class="text-center mb-4"><?= $title; ?></h2>

    <form action="" method="post" enctype="multipart/form-data" class="dark-form mx-auto">
        <!-- Judul -->
        <div class="form-group mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control input-dark"
                value="<?= esc($artikel['judul']); ?>" placeholder="Masukkan judul artikel" required>
        </div>

        <!-- Isi -->
        <div class="form-group mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="8" class="form-control input-dark" placeholder="Tulis isi artikel..."
                required><?= esc($artikel['isi']); ?></textarea>
        </div>

        <!-- Kategori -->
        <div class="form-group mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-select input-dark" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= esc($k['nama_kategori']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Gambar (Optional jika ingin ganti gambar) -->
        <div class="form-group mb-4">
            <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control input-dark">
        </div>

        <!-- Tombol -->
        <div class="text-end">
            <input type="submit" value="Update" class="btn btn-success px-4 py-2 fw-bold">
        </div>
    </form>
</div>

<?= $this->include('template/admin_footer'); ?>

<!-- Tambahan CSS -->
<style>
    body {
        background-color: #f8fafc;
        font-family: 'Inter', sans-serif;
        color: #212529;
    }

    .form-wrapper {
        max-width: 720px;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        margin-top: 40px;
    }

    h2 {
        font-weight: 700;
        font-size: 24px;
        color: #8a2be2;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 6px;
    }

    .input-dark,
    .form-control,
    .form-select {
        border-radius: 10px;
        border: 1px solid #ced4da;
        background-color: #ffffff;
        padding: 10px 14px;
        color: #212529;
        font-size: 15px;
    }

    .input-dark:focus,
    .form-control:focus,
    .form-select:focus {
        border-color: #c0398a2be22b;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.2);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .btn-success {
        background-color: #8a2be2;
        border: none;
        font-weight: 600;
        padding: 10px 24px;
        font-size: 16px;
        border-radius: 8px;
    }

    .btn-success:hover {
        background-color: #8a2be2;
    }

    input::placeholder,
    textarea::placeholder {
        color: #adb5bd;
    }

    select.input-dark option {
        background-color: #fff;
        color: #212529;
    }

    textarea.form-control {
        resize: vertical;
    }

    @media (max-width: 576px) {
        .form-wrapper {
            padding: 30px 20px;
        }
    }
</style>