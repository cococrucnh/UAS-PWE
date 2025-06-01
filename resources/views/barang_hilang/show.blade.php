<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang Hilang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            max-width: 550px;
            width: 100%;
            padding: 2rem;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            animation: fadeIn 0.5s ease;
        }

        h1 {
            color: #003366;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            text-align: center;
        }

        label {
            font-weight: 500;
            color: #333;
        }

        input:focus,
        textarea:focus {
            border-color: #0056b3 !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 86, 179, 0.25);
        }

        .form-control[readonly], .form-control:disabled {
            background-color: #e9ecef;
            opacity: 1;
        }

        .btn-primary {
            background-color: #0056b3;
            border-color: #004999;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #5a6268;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>📄 Detail Barang Hilang</h1>
        <form>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" value="{{ $barangHilang->nama_barang }}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" rows="3" readonly>{{ $barangHilang->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="lokasi_ditemukan" class="form-label">Lokasi Ditemukan</label>
                <input type="text" id="lokasi_ditemukan" class="form-control" value="{{ $barangHilang->lokasi_ditemukan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal_ditemukan" class="form-label">Tanggal Ditemukan</label>
                <input type="date" id="tanggal_ditemukan" class="form-control" value="{{ $barangHilang->tanggal_ditemukan }}" readonly>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" id="status" class="form-control" value="{{ ucfirst($barangHilang->status) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="nama_pengambil" class="form-label">Nama Pengambil (opsional)</label>
                <input type="text" id="nama_pengambil" class="form-control" value="{{ $barangHilang->nama_pengambil }}" readonly>
            </div>

            <div class="mb-4">
                <label for="tanggal_diambil" class="form-label">Tanggal Diambil</label>
                <input type="date" id="tanggal_diambil" class="form-control" value="{{ $barangHilang->tanggal_diambil }}" readonly>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('barang-hilang.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
