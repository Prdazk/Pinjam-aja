```blade
<div class="modal fade" id="editProgramStudyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">

      {{-- HEADER --}}
      <div class="modal-header bg-dark bg-opacity-75 text-white">
        <div>
          <h5 class="modal-title mb-1 fw-bold text-white">
            <i class="bi bi-pencil-square me-2"></i>
            Ubah Program Studi
          </h5>

          <small class="text-white fw-semibold">
            Perbarui informasi program studi
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

          {{-- NAMA PROGRAM STUDI --}}
          <div class="mb-3">

            <label for="name" class="form-label fw-semibold">
              <i class="bi bi-bookmark-fill text-primary me-1"></i>
              Nama Program Studi
            </label>

            <div class="input-group">

              <span class="input-group-text bg-light">
                <i class="bi bi-mortarboard-fill text-primary"></i>
              </span>

              <input type="text"
                name="name"
                id="name"
                class="form-control"
                placeholder="Masukkan nama program studi">

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

          <button type="submit"
            class="btn btn-success">
            <i class="bi bi-check-lg me-1"></i>
            Ubah Program Studi
          </button>

        </div>

      </form>

    </div>
  </div>
</div>