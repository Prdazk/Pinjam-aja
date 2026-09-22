```blade
@extends('layouts.app')

@section('title', 'Pengaturan Profil')
@section('description', 'Halaman pengaturan profil')

@section('content')
<div class="row">
  <div class="col-12">

    @include('utilities.alert')

    <div class="card border-0 shadow-sm">

      {{-- HEADER --}}
      <div class="card-header bg-dark text-white py-3">
        <div>
          <h4 class="card-title mb-1 text-white">
            <i class="bi bi-person-gear me-2"></i>
            @yield('title')
          </h4>

          <small class="text-white-50">
            Perbarui informasi profil akun Anda
          </small>
        </div>
      </div>

      {{-- FORM --}}
      <div class="card-body p-4">

        <form action="{{ route('administrators.profile-settings.update') }}" method="POST">
          @csrf
          @method('PUT')

          {{-- BARIS 1 --}}
          <div class="row g-4 mb-4">

            {{-- NAMA --}}
            <div class="col-md-6">
              <label for="name" class="form-label fw-semibold text-dark">
                <i class="bi bi-person-fill me-1"></i>
                Nama Lengkap
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-person text-dark"></i>
                </span>

                <input type="text"
                  id="name"
                  class="form-control bg-light border-start-0 @error('name', 'update') is-invalid @enderror"
                  name="name"
                  value="{{ $myInformation->name }}"
                  placeholder="Masukkan nama"
                  autofocus>

                @error('name', 'update')
                  <div class="invalid-feedback d-block">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            {{-- EMAIL --}}
            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold text-dark">
                <i class="bi bi-envelope-fill me-1"></i>
                Alamat Email
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-envelope text-dark"></i>
                </span>

                <input type="email"
                  id="email"
                  class="form-control bg-light border-start-0 @error('email', 'update') is-invalid @enderror"
                  name="email"
                  value="{{ $myInformation->email }}"
                  placeholder="Masukkan alamat email">

                @error('email', 'update')
                  <div class="invalid-feedback d-block">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

          </div>

          {{-- BARIS 2 --}}
          <div class="row g-4 mb-4">

            {{-- NOMOR HANDPHONE --}}
            <div class="col-md-6">
              <label for="phone_number" class="form-label fw-semibold text-dark">
                <i class="bi bi-telephone-fill me-1"></i>
                Nomor Handphone
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-phone text-dark"></i>
                </span>

                <input type="number"
                  id="phone_number"
                  class="form-control bg-light border-start-0 @error('phone_number', 'update') is-invalid @enderror"
                  name="phone_number"
                  value="{{ $myInformation->phone_number }}"
                  placeholder="Masukkan nomor handphone">

                @error('phone_number', 'update')
                  <div class="invalid-feedback d-block">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            {{-- PASSWORD --}}
            <div class="col-md-6">
              <label for="password" class="form-label fw-semibold text-dark">
                <i class="bi bi-lock-fill me-1"></i>
                Password
              </label>

              <input type="password"
                id="password"
                class="form-control bg-light @error('password', 'update') is-invalid @enderror"
                name="password"
                placeholder="Masukkan password">

              <small class="text-muted">
                Kosongkan jika password tidak ingin diubah.
              </small>

              @error('password', 'update')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
              @enderror
            </div>

          </div>

          {{-- BARIS 3 --}}
          <div class="row g-4">

            {{-- KONFIRMASI PASSWORD --}}
            <div class="col-md-6">
              <label for="password_confirmation" class="form-label fw-semibold text-dark">
                <i class="bi bi-shield-lock-fill me-1"></i>
                Konfirmasi Password
              </label>

              <input type="password"
                id="password_confirmation"
                class="form-control bg-light @error('password_confirmation', 'update') is-invalid @enderror"
                name="password_confirmation"
                placeholder="Ulangi password">

              @error('password_confirmation', 'update')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
              @enderror
            </div>

          </div>

          {{-- FOOTER --}}
          <div class="d-flex justify-content-end mt-4 pt-3 border-top">

            <button type="submit" class="btn btn-success">
              <i class="bi bi-check-lg me-1"></i>
              Simpan Perubahan
            </button>

          </div>

        </form>

      </div>
    </div>

  </div>
</div>
@endsection
```
