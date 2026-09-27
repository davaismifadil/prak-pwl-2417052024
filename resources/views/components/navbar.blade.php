<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3" style="background: linear-gradient(135deg, #1e1e2f 0%, #111827 100%) !important; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
    <div class="container">
        <a class="navbar-brand d-flex items-center gap-2 fw-bold fs-4 text-white" href="{{ url('/user') }}">
            <span class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-3 shadow-sm" style="width: 40px; height: 40px; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%) !important;">
                <i class="bi bi-mortarboard-fill fs-5"></i>
            </span>
            <span>
                PWL<span class="text-primary" style="color: #818cf8 !important;">App</span>
            </span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-2 transition-all {{ request()->is('user') ? 'active fw-semibold text-white bg-white bg-opacity-10' : 'text-light text-opacity-75' }}" href="{{ url('/user') }}">
                        <i class="bi bi-people-fill me-1"></i> Daftar Pengguna
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-2 transition-all {{ request()->is('user/create') ? 'active fw-semibold text-white bg-white bg-opacity-10' : 'text-light text-opacity-75' }}" href="{{ route('user.create') }}">
                        <i class="bi bi-person-plus-fill me-1"></i> Tambah Pengguna
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <span class="badge rounded-pill bg-light bg-opacity-10 text-light px-3 py-2 border border-light border-opacity-10 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="bi bi-code-slash text-info"></i>
                    <span>Modul 4: Controller & View</span>
                </span>
                <div class="d-flex align-items-center gap-2 border-start border-secondary ps-3 ms-1">
                    <div class="avatar-badge d-inline-flex align-items-center justify-content-center rounded-circle text-white fw-bold shadow-sm" style="width: 38px; height: 38px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); font-size: 0.85rem;">
                        DI
                    </div>
                    <div class="d-none d-sm-block text-start lh-1">
                        <div class="fw-semibold text-white small">Dava Ismi Fadil</div>
                        <div class="text-white-50" style="font-size: 0.75rem;">2417052024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
