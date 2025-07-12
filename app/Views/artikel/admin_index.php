<?= $this->include('template/admin_header'); ?>

<div class="container my-4">
    <!-- Search & Filter Form -->
    <form id="search-form" method="get" class="form-search mb-4">
        <div class="row g-2">
            <div class="col-md-5">
                <input type="text" name="q" id="search-box" placeholder="Cari data" class="form-control">
            </div>
            <div class="col-md-4">
                <select name="kategori_id" id="kategori-filter" class="form-control">
                    <option value="">Semua Kategori</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </div>
    </form>

    <!-- Spinner Loading -->
    <div id="loading-spinner" class="text-center my-4" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Kontainer Artikel -->
    <div id="article-container">
        <!-- Akan diisi via AJAX -->
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3" id="pagination-container">
        <!-- Akan diisi via AJAX -->
    </div>
</div>

<?= $this->include('template/admin_footer'); ?>

<!-- jQuery untuk AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function fetchData(url = '/admin/artikel') {
            const q = $('#search-box').val();
            const kategori_id = $('#kategori-filter').val();

            $('#article-container').hide();
            $('#pagination-container').hide();
            $('#loading-spinner').show();

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {
                    q: q,
                    kategori_id: kategori_id
                },
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                success: function (data) {
                    renderArticles(data.artikel);
                    $('#pagination-container').html(data.pager.links);
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    $('#article-container').html('<p class="text-danger text-center">Gagal memuat data.</p>');
                },
                complete: function () {
                    $('#loading-spinner').hide();
                    $('#article-container').show();
                    $('#pagination-container').show();
                }
            });
        }

        function renderArticles(artikel) {
            let html = '<div class="table-responsive"><table class="table table-bordered table-striped">';
            html += '<thead><tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Gambar</th><th>Status</th><th>Aksi</th></tr></thead><tbody>';

            if (artikel.length > 0) {
                artikel.forEach(row => {
                    html += `<tr>
                    <td>${row.id}</td>
                    <td><b>${row.judul}</b><p><small>${row.isi.substring(0, 50)}...</small></p></td>
                    <td>${row.nama_kategori || '-'}</td>
                     <td>
                     ${row.gambar ? `<img src="/gambar/${row.gambar}" alt="gambar" style="width: 70px; height: auto; border-radius: 6px;">` : '-'}
                    </td>
                    <td>${row.status}</td>
                    <td>
                        <a href="/admin/artikel/edit/${row.id}" class="btn btn-warning btn-sm">Ubah</a>
                        <a href="/admin/artikel/delete/${row.id}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data?');">Hapus</a>
                    </td>
                </tr>`;
                });
            } else {
                html += '<tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>';
            }

            html += '</tbody></table></div>';
            $('#article-container').html(html);
        }

        $('#search-form').on('submit', function (e) {
            e.preventDefault();
            fetchData();
        });

        $('#kategori-filter').on('change', function () {
            $('#search-form').trigger('submit');
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            const url = $(this).attr('href');
            if (url) fetchData(url);
        });

        fetchData();
    });
</script>

<!-- CSS Styling -->
<style>
    <style>body {
        background-color: #f4f7fc;
        color: #333;
        font-family: 'Inter', sans-serif;
    }

    .form-search input,
    .form-search select {
        border-radius: 8px;
        background-color: #fff;
        color: #495057;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    .form-search input::placeholder {
        color: #adb5bd;
    }

    .form-search select {
        background-color: #fff;
    }

    .form-search button {
        border-radius: 8px;
        background-color: #8a2be2;
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 10px;
        transition: background 0.3s ease;
    }

    .form-search button:hover {
        background-color: #8a2be2;
    }

    .table {
        background-color: #fff;
        color: #212529;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }

    .table th {
        background-color: #f1f3f5;
        color: #495057;
        font-weight: 600;
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
    }

    .table td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .table th:last-child,
    .table td:last-child {
        white-space: nowrap;
    }

    .table th:nth-child(3),
    .table td:nth-child(3),
    .table th:nth-child(5),
    .table td:nth-child(5),
    .table th:nth-child(6),
    .table td:nth-child(6) {
        text-align: center;
    }

    img {
        border-radius: 6px;
        max-height: 60px;
    }

    .btn-warning {
        background-color: #fcb900;
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 6px 10px;
        border-radius: 6px;
        transition: background 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #8a2be2;
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 6px 10px;
        border-radius: 6px;
        transition: background 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .pagination .page-link {
        background-color: #fff;
        color: #c0392b;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        margin: 0 3px;
    }

    .pagination .active .page-link {
        background-color: #c0392b;
        color: #fff;
        border-color: #c0392b;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        color: #c0392b;
    }

    #loading-spinner .spinner-border {
        width: 3rem;
        height: 3rem;
        color: #c0392b;
    }

    .table td p {
        margin: 0;
        font-size: 0.9rem;
        color: #6c757d;
    }
</style>

</style>