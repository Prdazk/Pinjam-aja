<div class="modal fade" id="createAdministratorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">

      {{-- HEADER --}}
          <div class="modal-header bg-dark bg-opacity-75 text-white">
            <div>
              <h5 class="modal-title mb-1 fw-bold text-white">
                <i class="bi bi-person-plus-fill me-2"></i>
                Tambah Admin
              </h5>

              <small class="text-white fw-semibold">
                Tambahkan akun Admin baru
              </small>
            </div>

            <button type="button"
              class="btn-close btn-close-white"
              data-bs-dismiss="modal"
              aria-label="Close">
            </button>
          </div>

      {{-- FORM --}}
      <form action="{{ route('administrators.users.store') }}" method="POST">
        @csrf

        <div class="modal-body p-4">

          {{-- BARIS 1 --}}
          <div class="row g-3 mb-3">

            {{-- NAMA --}}
            <div class="col-md-6">
              <label for="name" class="form-label fw-semibold">
                Nama
              </label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-person-fill"></i>
                </span>
                <input type="text" name="name" id="name"
                  class="form-control @error('name', 'store') is-invalid @enderror"
                  placeholder="Masukkan nama"
                  @if($errors->hasBag('store')) value="{{ old('name') }}" @endif
                  required>
              </div>
              @error('name', 'store')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            {{-- EMAIL --}}
            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold">
                Alamat Email
              </label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-envelope-fill"></i>
                </span>
                <input type="email" name="email" id="email"
                  class="form-control @error('email', 'store') is-invalid @enderror"
                  placeholder="Masukkan email"
                  @if($errors->hasBag('store')) value="{{ old('email') }}" @endif
                  required>
              </div>
              @error('email', 'store')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

          </div>

          {{-- BARIS 2 --}}
          <div class="row g-3 mb-3">

            {{-- NOMOR HANDPHONE --}}
            <div class="col-md-6">
              <label for="phone_number" class="form-label fw-semibold">
                Nomor Handphone
              </label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-telephone-fill"></i>
                </span>
                <input type="number" name="phone_number" id="phone_number"
                  class="form-control @error('phone_number', 'store') is-invalid @enderror"
                  placeholder="Masukkan nomor"
                  @if($errors->hasBag('store')) value="{{ old('phone_number') }}" @endif
                  required>
              </div>
              @error('phone_number', 'store')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            {{-- PASSWORD --}}
            <div class="col-md-6">
              <label for="password" class="form-label fw-semibold">
                Password
              </label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-lock-fill"></i>
                </span>
                <input type="password" name="password" id="password"
                  class="form-control @error('password', 'store') is-invalid @enderror"
                  placeholder="Masukkan password"
                  required>
              </div>
              @error('password', 'store')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

          </div>

          {{-- KONFIRMASI PASSWORD --}}
          <div class="row">
            <div class="col-md-6">
              <label for="password_confirmation" class="form-label fw-semibold">
                Konfirmasi Password
              </label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-shield-lock-fill"></i>
                </span>
                <input type="password" name="password_confirmation"
                  id="password_confirmation"
                  class="form-control @error('password_confirmation', 'store') is-invalid @enderror"
                  placeholder="Ulangi password"
                  required>
              </div>
              @error('password_confirmation', 'store')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>

        </div>

        {{-- FOOTER --}}
        <div class="modal-footer bg-light">
          <button type="button"
            class="btn btn-secondary close-button"
            data-bs-dismiss="modal">
            <i class="bi bi-x-lg me-1"></i>
            Tutup
          </button>

          <button type="submit" class="btn btn-success">
            <i class="bi bi-person-plus-fill me-1"></i>
            Tambah Admin
          </button>
        </div>

      </form>
    </div>
  </div>
</div>