<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang Hilang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* CSS-mu tetap sama */
        body {
            background-color: #f4f6f9;
        }
        h1 {
            color: #003366;
        }
        table.table thead tr th {
            background-color: #b8d4f1 !important;
            color: #003366 !important;
            font-weight: bold !important;
        }
        .table tbody tr:hover {
            background-color: #e3f0fb;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #004999;
        }
        .btn-warning {
            background-color: #f0ad4e;
            border-color: #eea236;
        }
        .btn-danger {
            background-color: #d9534f;
            border-color: #d43f3a;
        }

        .btn-soft-primary {
            background-color: #3563a6;
            border-color: #2b5385;
            color: white;
        }
        .btn-soft-primary:hover {
            background-color: #2b5385;
            border-color: #24466a;
            color: white;
        }

        .badge-success {
            background-color: #3399ff;
        }
        .badge-secondary {
            background-color: #6c757d;
        }
        .badge-warning {
            background-color: #ffd966;
            color: #212529;
        }

        .badge.bg-success,
        .badge.bg-warning,
        .badge.bg-danger,
        .badge.bg-light {
            color: #212529 !important;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        #deleteModal .modal-dialog {
            max-width: 420px;
            margin: 1.75rem auto;
        }
        #deleteModal .modal-content {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        #deleteModal .modal-header {
            background-color: #b8d4f1;
            color: #003366;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }
        #deleteModal .modal-title {
            font-size: 1.25rem;
        }
        #deleteModal .modal-body {
            font-size: 1.125rem;
            padding: 1.25rem 1.5rem;
            color: #212529;
        }
        #deleteModal .modal-footer {
            padding: 0.75rem 1.5rem;
            gap: 0.75rem;
            justify-content: flex-end;
        }
        #deleteModal .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-weight: 500;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        #deleteModal .btn-danger {
            background-color: #d9534f;
            border-color: #d43f3a;
            font-weight: 600;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .badge-diambil {
            background-color: #7cd1a9; 
            color: #0b3f2c; 
        }

        .badge-ditemukan {
            background-color: #ffe28a;  
            color: #5c4400;            
        }

        .badge-hilang {
            background-color: #f28b82; 
            color: #6b1212;           
        }

        .badge-default {
            background-color: #cfd8dc; 
            color: #37474f;             
        }

        .search-form {
            gap: 0.5rem;
            max-width: 280px;
        }
        .search-form input.form-control-sm {
            min-width: 160px;
        }
        .search-form select.form-select-sm {
            min-width: 140px;
        }
    </style>

</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="modal-header" style="background-color: #b8d4f1; color: #003366; font-weight: 600; padding: 1rem 1.5rem;">
            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" style="font-size: 1.125rem; padding: 1.25rem 1.5rem; color: #212529;">
            Apakah Anda yakin ingin logout?
            </div>
            <div class="modal-footer" style="padding: 0.75rem 1.5rem; gap: 0.75rem; justify-content: flex-end;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger" style="font-weight: 600; padding-left: 1.5rem; padding-right: 1.5rem;">Logout</button>
            </div>
        </form>
        </div>
    </div>
    </div>

   <h1 class="mb-5 text-center">📦DAFTAR BARANG HILANG📦</h1>

    @if(session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
            <div id="success-toast" class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('success-toast');
                if (toast) {
                    toast.classList.remove('show');
                    setTimeout(() => toast.remove(), 500);
                }
            }, 5000);
        </script>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <form method="GET" action="{{ route('barang-hilang.index') }}" class="d-flex search-form">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="bi bi-search"></i>
            </button>
            
            <input 
                type="search" 
                name="query" 
                value="{{ request('query') }}" 
                class="form-control form-control-sm" 
                placeholder="Cari nama barang..."
                aria-label="Cari nama barang"
            >

            <select name="status" class="form-select form-select-sm" aria-label="Filter status">
                <option value="">Semua Status</option>
                <option value="hilang" {{ request('status') == 'hilang' ? 'selected' : '' }}>Hilang</option>
                <option value="ditemukan" {{ request('status') == 'ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                <option value="diambil" {{ request('status') == 'diambil' ? 'selected' : '' }}>Diambil</option>
            </select>
        </form>

        <a href="{{ route('barang-hilang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </a>

    </div>

    <table class="table table-hover table-bordered align-middle">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Lokasi Ditemukan</th>
                <th>Tanggal Ditemukan</th>
                <th>Status</th>
                <th>Nama Pengambil</th>
                <th>Tanggal Diambil</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $barang)
                <tr>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->lokasi_ditemukan }}</td>
                    <td>{{ $barang->tanggal_ditemukan }}</td>
                    <td>
                        @php
                            $warna = match($barang->status) {
                                'diambil' => 'badge-diambil',
                                'hilang' => 'badge-hilang',
                                'ditemukan' => 'badge-ditemukan',
                                default => 'badge-default'
                            };
                        @endphp
                        <span class="badge {{ $warna }}">{{ ucfirst($barang->status) }}</span>
                    </td>

                    <td>{{ $barang->nama_pengambil ?? '-' }}</td>
                    <td>{{ $barang->tanggal_diambil ?? '-' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('barang-hilang.show', $barang->id) }}" class="btn btn-sm btn-soft-primary">
                                <i class="bi bi-file-earmark-text"></i>
                            </a>
                            <a href="{{ route('barang-hilang.edit', $barang->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button 
                                type="button" 
                                class="btn btn-sm btn-danger btn-delete" 
                                data-id="{{ $barang->id }}"
                                data-nama="{{ $barang->nama_barang }}">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada data barang hilang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="text-muted small">Total: {{ $data->count() }} barang</div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus barang <strong id="namaBarang"></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Modal delete
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    var deleteForm = document.getElementById('deleteForm');
    var namaBarangSpan = document.getElementById('namaBarang');

    document.querySelectorAll('.btn-delete').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var nama = this.getAttribute('data-nama');
            deleteForm.action = '/barang-hilang/' + id;
            namaBarangSpan.textContent = nama;
            deleteModal.show();
        });
    });

    // Submit form filter langsung saat status berubah atau tekan Enter di input search
    const form = document.querySelector('form.search-form');
    const queryInput = form.querySelector('input[name="query"]');
    const statusSelect = form.querySelector('select[name="status"]');

    // Submit form saat status berubah
    statusSelect.addEventListener('change', function() {
        form.submit();
    });

    // Submit form saat input search tekan Enter
    queryInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // supaya gak submit ganda
            form.submit();
        }
    });

});
</script>

</body>
</html>
