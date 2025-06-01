<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang Hilang</title>
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
        <h1>✏️ Edit Barang Hilang</h1>
        <form action="{{ route('barang-hilang.update', $barangHilang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $barangHilang->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ $barangHilang->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="lokasi_ditemukan" class="form-label">Lokasi Ditemukan</label>
                <input type="text" name="lokasi_ditemukan" id="lokasi_ditemukan" class="form-control" value="{{ $barangHilang->lokasi_ditemukan }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_ditemukan" class="form-label">Tanggal Ditemukan</label>
                <input type="date" name="tanggal_ditemukan" id="tanggal_ditemukan" class="form-control" value="{{ $barangHilang->tanggal_ditemukan }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="hilang" {{ $barangHilang->status === 'hilang' ? 'selected' : '' }}>Hilang</option>
                    <option value="ditemukan" {{ $barangHilang->status === 'ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                    <option value="diambil" {{ $barangHilang->status === 'diambil' ? 'selected' : '' }}>Diambil</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_pengambil" class="form-label">Nama Pengambil (opsional)</label>
                <input type="text" name="nama_pengambil" id="nama_pengambil" class="form-control" value="{{ $barangHilang->nama_pengambil }}">
            </div>

            <div class="mb-4">
                <label for="tanggal_diambil" class="form-label">Tanggal Diambil</label>
                <input type="date" name="tanggal_diambil" id="tanggal_diambil" class="form-control" value="{{ $barangHilang->tanggal_diambil }}">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('barang-hilang.index') }}" class="btn btn-secondary">← Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</body>
</html>
