@extends('app')
@section('content')
    <div class="row">
        {{-- Kolom Kiri: Settings Application --}}
        <div class="col-lg-6 mb-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-semibold text-primary">Settings Application</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="login_title" class="form-label fw-semibold">Login Title</label>
                            <input type="text" class="form-control @error('login_title') is-invalid @enderror"
                                id="login_title" name="login_title"
                                value="{{ old('login_title', $setting->login_title) }}"
                                placeholder="Contoh: Point Of Sales">
                            <div class="form-text">Judul yang muncul di halaman login.</div>
                            @error('login_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sidebar_title" class="form-label fw-semibold">Sidebar Title</label>
                            <input type="text" class="form-control @error('sidebar_title') is-invalid @enderror"
                                id="sidebar_title" name="sidebar_title"
                                value="{{ old('sidebar_title', $setting->sidebar_title) }}"
                                placeholder="Contoh: AdminPanel">
                            <div class="form-text">Nama atau judul yang tampil di bagian atas sidebar.</div>
                            @error('sidebar_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="fav_icon" class="form-label fw-semibold">Logo Favicon</label>
                            @if ($setting->fav_icon)
                                <div class="mb-2 p-2 border rounded d-inline-flex align-items-center bg-light">
                                    <img src="{{ asset('storage/' . $setting->fav_icon) }}" alt="Favicon Preview"
                                        class="me-2" style="width: 32px; height: 32px; object-fit: contain;">
                                    <span class="small text-muted">Favicon saat ini</span>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('fav_icon') is-invalid @enderror"
                                id="fav_icon" name="fav_icon" accept="image/*,.ico">
                            <div class="form-text">Format: PNG, JPG, ICO, SVG (Maks. 2MB). Digunakan untuk ikon tab browser.</div>
                            @error('fav_icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="form-label fw-semibold">Logo Aplikasi (Sidebar & Login)</label>
                            @if ($setting->logo)
                                <div class="mb-2 p-2 border rounded d-inline-flex align-items-center bg-light">
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo Preview"
                                        class="me-2" style="max-height: 60px; max-width: 150px; object-fit: contain;">
                                    <span class="small text-muted">Logo saat ini</span>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                id="logo" name="logo" accept="image/*">
                            <div class="form-text">Format: PNG, JPG, JPEG, SVG, WebP (Maks. 2MB). Ditampilkan di sidebar dan halaman login.</div>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: User Profile Form & Logout --}}
        <div class="col-lg-6 mb-4">
            @if (session('success_user'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success_user') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-primary">User Profile</h5>
                    <span class="badge bg-primary px-2 py-1">Account Login</span>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('setting.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name"
                                value="{{ old('name', auth()->user()?->name) }}" required
                                placeholder="Masukkan nama lengkap">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email"
                                value="{{ old('email', auth()->user()?->email) }}" required
                                placeholder="Masukkan email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4 text-muted">

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password"
                                placeholder="Kosongkan jika tidak ingin mengubah password">
                            <div class="form-text">Minimal 3 karakter. Kosongkan jika password tidak diganti.</div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control"
                                id="password_confirmation" name="password_confirmation"
                                placeholder="Ulangi password baru">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                Update Profil
                            </button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center p-3 rounded bg-light border">
                        <div>
                            <h6 class="mb-1 fw-bold text-danger">Keluar Sesi</h6>
                            <p class="small text-muted mb-0">Keluar dari akun aplikasi saat ini.</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger px-3 fw-semibold"
                                onclick="return confirm('Apakah Anda yakin ingin logout?')">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection