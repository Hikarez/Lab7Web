<?= $this->include('template/admin_header'); ?>

<div class="form-wrapper container my-5">
    <h2 class="text-center mb-4"><?= $title; ?></h2>

    <form action="" method="post" enctype="multipart/form-data" class="dark-form mx-auto">
        <!-- Judul -->
        <div class="form-group mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control input-dark"
                placeholder="Masukkan judul artikel" required>
        </div>

        <!-- Isi -->
        <div class="form-group mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="8" class="form-control input-dark" placeholder="Tulis isi artikel..."
                required></textarea>
        </div>

        <!-- Kategori -->
        <div class="form-group mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-select input-dark" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>"><?= esc($k['nama_kategori']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Gambar -->
        <div class="form-group mb-4">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control input-dark">
        </div>

        <!-- Tombol -->
        <div class="text-end">
            <input type="submit" value="Kirim" class="btn btn-success px-4 py-2 fw-bold">
        </div>
    </form>
</div>

<?= $this->include('template/admin_footer'); ?>

<!-- Tambahan CSS -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

    .form-wrapper {
        font-family: 'Inter', sans-serif;
        max-width: 700px;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        color: #2d3436;
        border: 1px solid #e0e0e0;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #2d3436;
    }

    .input-dark {
        background-color: #f5f7fa;
        border: 1px solid #ced4da;
        border-radius: 8px;
        color: #2d3436;
        padding: 10px 14px;
        font-size: 15px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .input-dark:focus {
        border-color: #8a2be2;
        box-shadow: 0 0 0 3px rgba(116, 185, 255, 0.3);
        outline: none;
        background-color: #ffffff;
    }

    select.input-dark option {
        background-color: #ffffff;
        color: #2d3436;
    }

    /* Tombol */
    .btn-success {
        background-color: #8a2be2;
        border: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #8a2be2;
    }

    /* Placeholder */
    ::placeholder,
    input::placeholder,
    textarea::placeholder {
        color: #b2bec3 !important;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .form-wrapper {
            padding: 30px 20px;
        }
    }
</style>