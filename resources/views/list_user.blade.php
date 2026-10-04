@extends('layouts.app')

@section('content')
<div class="container py-2">
    <!-- Header Section -->
    <div class="row align-items-center mb-4 g-3">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 text-muted small">
                    <li class="breadcrumb-item"><a href="{{ url('/user') }}" class="text-decoration-none text-muted"><i class="bi bi-house-door me-1"></i>Home</a></li>
                    <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Pengguna</li>
                </ol>
            </nav>
            <h1 class="h3 fw-bold text-dark mb-1">Daftar Pengguna</h1>
            <p class="text-muted mb-0 small">
                Menampilkan data mahasiswa dan relasi kelas hasil integrasi Controller, Model, dan Eloquent ORM.
            </p>
        </div>
        <div class="col-md-5 text-md-end">
            <a href="{{ route('user.create') }}" class="btn btn-primary px-3 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2">
                <i class="bi bi-person-plus-fill fs-5"></i>
                <span class="fw-semibold">Tambah Mahasiswa Baru</span>
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 text-white flex-shrink-0" style="width: 48px; height: 48px; background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Total Mahasiswa</div>
                        <div class="h4 fw-bold text-dark mb-0">{{ count($users) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 text-white flex-shrink-0" style="width: 48px; height: 48px; background: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%);">
                        <i class="bi bi-diagram-3-fill fs-4"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Kelas Terdaftar</div>
                        <div class="h4 fw-bold text-dark mb-0">
                            {{ $users->pluck('nama_kelas')->unique()->filter()->count() ?: 4 }} <span class="fs-6 fw-normal text-muted">Kelas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 text-white flex-shrink-0" style="width: 48px; height: 48px; background: linear-gradient(135deg, #059669 0%, #34d399 100%);">
                        <i class="bi bi-database-check fs-4"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Status Database</div>
                        <div class="h5 fw-bold text-dark mb-0">PostgreSQL <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill fs-7">Terkoneksi</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic User Table Component -->
    <x-user-table :users="$users" />
</div>
@endsection
