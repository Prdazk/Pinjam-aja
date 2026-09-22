```blade id="k4p9yx"
<div class="modal fade" id="createSchoolClassModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">

      {{-- HEADER --}}
      <div class="modal-header bg-dark bg-opacity-75 text-white">
        <div>
          <h5 class="modal-title mb-1 fw-bold text-white">
            <i class="bi bi-door-open-fill me-2"></i>
            Tambah Kelas
          </h5>

          <small class="text-white fw-semibold">
            Tambahkan data kelas baru
          </small>
        </div>

        <button type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close">
        </button>
      </div>

      {{-- FORM --}}
      <form action="{{ route('administrators.school-classes.store') }}" method="POST">
        @csrf

        <div class="modal-body p-4">

          {{-- NAMA KELAS --}}
          <div class="mb-3">

            <label for="name" class="form-label fw-semibold">
              <i class="bi bi-building-fill text-primary me-1"></i>
              Nama Kelas
            </label>

            <div class="input-group">

              <span class="input-group-text bg-light">
                <i class="bi bi-door-open-fill text-primary"></i>
              </span>

              <input type="text"
                name="name"
                id="name"
                class="form-control @error('name', 'store') is-invalid @enderror"
                placeholder="Masukkan nama kelas"
                @if($errors->hasBag('store'))
                  value="{{ old('name') }}"
                @endif
                required>

            </div>

            @error('name', 'store')
              <div class="d-block invalid-feedback">
                {{ $message }}
              </div>
            @enderror

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

          <button type="submit"
            class="btn btn-success">
            <i class="bi bi-plus-circle-fill me-1"></i>
            Tambah Kelas
          </button>

        </div>

      </form>

    </div>
  </div>
</div>