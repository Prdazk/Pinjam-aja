```blade
<div class="modal fade" id="editOfficerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">

      {{-- HEADER --}}
      <div class="modal-header bg-dark text-white">
        <div>
          <h5 class="modal-title mb-1">
            <i class="bi bi-pencil-square me-2"></i>
            Ubah Petugas
          </h5>
          <small class="text-white-50">
            Perbarui informasi akun Petugas
          </small>
        </div>

        <button type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close">
        </button>
      </div>

      {{-- FORM --}}
      <form action="#" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body p-4">

          {{-- BARIS 1 --}}
          <div class="row g-4 mb-4">

            {{-- NAMA --}}
            <div class="col-md-6">
              <label for="name" class="form-label fw-semibold text-dark">
                <i class="bi bi-person-fill me-1"></i>
                Nama
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-person text-dark"></i>
                </span>

                <input type="text"
                  name="name"
                  id="name"
                  class="form-control bg-light border-start-0"
                  placeholder="Masukkan nama">
              </div>
            </div>

            {{-- EMAIL --}}
            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold text-dark">
                <i class="bi bi-envelope-fill me-1"></i>
                Email
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-envelope text-dark"></i>
                </span>

                <input type="email"
                  name="email"
                  id="email"
                  class="form-control bg-light border-start-0"
                  placeholder="Masukkan email">
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

                <input type="text"
                  name="phone_number"
                  id="phone_number"
                  class="form-control bg-light border-start-0"
                  placeholder="Masukkan nomor handphone">
              </div>
            </div>

            {{-- PASSWORD --}}
            <div class="col-md-6">
              <label for="password" class="form-label fw-semibold text-dark">
                <i class="bi bi-lock-fill me-1"></i>
                Password
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-lock text-dark"></i>
                </span>

                <input type="password"
                  name="password"
                  id="password"
                  class="form-control bg-light border-start-0"
                  placeholder="Masukkan password">
              </div>
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

              <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                  <i class="bi bi-shield-lock text-dark"></i>
                </span>

                <input type="password"
                  name="password_confirmation"
                  id="password_confirmation"
                  class="form-control bg-light border-start-0"
                  placeholder="Ulangi password">
              </div>
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
            <i class="bi bi-check-lg me-1"></i>
            Ubah Petugas
          </button>

        </div>

      </form>
    </div>
  </div>
</div>
```
