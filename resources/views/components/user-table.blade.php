@props(['users' => []])

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white py-3 px-4 border-bottom border-light-subtle d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2 fw-semibold">
                <i class="bi bi-people me-1"></i> Total: {{ count($users) }} Mahasiswa
            </span>
        </div>
        
        <div class="d-flex align-items-center gap-2">
            <div class="input-group input-group-sm" style="max-width: 260px;">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" id="tableSearchInput" class="form-control bg-light border-start-0 ps-0" placeholder="Cari nama / NPM...">
            </div>
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary rounded-3 px-3 d-inline-flex align-items-center gap-1 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); border: none;">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-sm-inline">Tambah Mahasiswa</span>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" id="userListTable">
            <thead class="table-light text-uppercase text-secondary" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                <tr>
                    <th scope="col" class="py-3 ps-4" style="width: 70px;">#</th>
                    <th scope="col" class="py-3">Nama Mahasiswa</th>
                    <th scope="col" class="py-3">NPM</th>
                    <th scope="col" class="py-3 text-center">Kelas</th>
                    <th scope="col" class="py-3 pe-4 text-end">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($users as $index => $user)
                    @php
                        // Avatar background colors based on ID
                        $colors = ['#4f46e5', '#0284c7', '#059669', '#d97706', '#dc2626', '#7c3aed'];
                        $bgColor = $colors[$user->id % count($colors)];
                        
                        // Extract initials
                        $words = explode(' ', trim($user->nama));
                        $initials = '';
                        foreach (array_slice($words, 0, 2) as $w) {
                            $initials .= strtoupper(substr($w, 0, 1));
                        }
                        
                        // Kelas badge style
                        $kelas = strtoupper(trim($user->nama_kelas ?? ''));
                        $badgeClass = match($kelas) {
                            'A' => 'bg-primary-subtle text-primary border-primary-subtle',
                            'B' => 'bg-success-subtle text-success border-success-subtle',
                            'C' => 'bg-warning-subtle text-warning-emphasis border-warning-subtle',
                            'D' => 'bg-danger-subtle text-danger border-danger-subtle',
                            default => 'bg-secondary-subtle text-secondary border-secondary-subtle'
                        };
                    @endphp
                    <tr class="user-row">
                        <td class="ps-4 fw-medium text-muted">
                            <span class="badge bg-light text-secondary border rounded-pill px-2 py-1">
                                {{ $user->id }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar d-inline-flex align-items-center justify-content-center text-white fw-bold rounded-circle shadow-sm flex-shrink-0" style="width: 38px; height: 38px; background-color: {{ $bgColor }}; font-size: 0.82rem;">
                                    {{ $initials ?: 'U' }}
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark user-name">{{ $user->nama }}</div>
                                    <small class="text-muted d-block" style="font-size: 0.78rem;">
                                        <i class="bi bi-clock-history me-1"></i> Terdaftar di sistem
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <code class="px-2 py-1 bg-light rounded text-dark border user-npm fw-semibold" style="font-size: 0.88rem;">
                                {{ $user->nim ?? $user->npm }}
                            </code>
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $badgeClass }} border rounded-pill px-3 py-1 fw-bold fs-6">
                                Kelas {{ $user->nama_kelas }}
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <div class="d-inline-flex gap-1">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-3 px-2 py-1" title="Detail Pengguna" onclick="alert('Mahasiswa: {{ addslashes($user->nama) }}\nNPM: {{ $user->nim ?? $user->npm }}\nKelas: {{ $user->nama_kelas }}')">
                                    <i class="bi bi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="py-4">
                                <div class="mb-3">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-light text-muted rounded-circle p-3" style="width: 70px; height: 70px;">
                                        <i class="bi bi-inbox fs-1"></i>
                                    </span>
                                </div>
                                <h5 class="fw-bold text-dark mb-1">Belum Ada Data Pengguna</h5>
                                <p class="text-muted small mb-3">Data pengguna masih kosong di database. Silakan tambahkan data baru.</p>
                                <a href="{{ route('user.create') }}" class="btn btn-primary rounded-3 px-4 shadow-sm">
                                    <i class="bi bi-plus-lg me-1"></i> Tambah Pengguna Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('tableSearchInput');
        if (searchInput) {
            searchInput.addEventListener('keyup', function () {
                const query = this.value.toLowerCase().trim();
                const rows = document.querySelectorAll('#userListTable tbody tr.user-row');
                rows.forEach(row => {
                    const name = row.querySelector('.user-name')?.textContent.toLowerCase() || '';
                    const npm = row.querySelector('.user-npm')?.textContent.toLowerCase() || '';
                    if (name.includes(query) || npm.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    });
</script>
