@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <!-- Breadcrumb Navigation -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb text-muted small">
                    <li class="breadcrumb-item"><a href="{{ url('/user') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door me-1"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/user') }}" class="text-decoration-none text-muted">Pengguna</a></li>
                    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Tambah Pengguna</li>
                </ol>
            </nav>

            <!-- Card Form -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-white border-bottom border-light-subtle p-4 pb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 text-white shadow-sm flex-shrink-0" style="width: 46px; height: 46px; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
                            <i class="bi bi-person-fill-add fs-4"></i>
                        </div>
                        <div>
                            <h2 class="h5 fw-bold text-dark mb-0">Buat Pengguna Baru</h2>
                            <p class="text-muted small mb-0">Isi formulir di bawah ini untuk menambahkan data mahasiswa baru ke sistem database.</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 pt-3">
                    <form action="{{ route('user.store') }}" method="POST" id="createUserForm">
                        @csrf

                        <!-- Field: Nama Lengkap -->
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold text-secondary small">
                                <i class="bi bi-person me-1 text-primary"></i> Nama Lengkap
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-fonts"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" id="nama" name="nama" placeholder="Masukkan nama lengkap mahasiswa" required autocomplete="off">
                            </div>
                            <div class="form-text text-muted small">Nama lengkap sesuai dengan data akademik.</div>
                        </div>

                        <!-- Field: NPM -->
                        <div class="mb-3">
                            <label for="npm" class="form-label fw-semibold text-secondary small">
                                <i class="bi bi-card-text me-1 text-primary"></i> Nomor Pokok Mahasiswa (NPM)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" id="npm" name="npm" placeholder="Contoh: 2417052024" required pattern="[0-9]+" title="Masukkan angka NPM">
                            </div>
                            <div class="form-text text-muted small">NPM 10 digit tanpa spasi atau tanda baca.</div>
                        </div>

                        <!-- Field: Kelas -->
                        <div class="mb-4">
                            <label for="kelas_id" class="form-label fw-semibold text-secondary small">
                                <i class="bi bi-building me-1 text-primary"></i> Pilihan Kelas
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="bi bi-collection"></i>
                                </span>
                                <select name="kelas_id" id="kelas_id" class="form-select border-start-0 ps-0" required>
                                    <option value="" disabled selected>-- Pilih Kelas Mahasiswa --</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">Kelas {{ $kelasItem->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-text text-muted small">Pilihan kelas diambil secara dinamis dari tabel <code>kelas</code> di database.</div>
                        </div>

                        <hr class="my-4 border-light-subtle">

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <a href="{{ url('/user') }}" class="btn btn-light border px-4 py-2 rounded-3 text-secondary d-inline-flex align-items-center gap-2">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2 fw-semibold">
                                <i class="bi bi-check2-circle fs-5"></i> Simpan Data Pengguna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
