```blade
<div class="modal fade" id="detailBorrowingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 shadow">

      {{-- HEADER --}}
      <div class="modal-header bg-dark text-white">

        <div>
          <h5 class="modal-title mb-1">
            <i class="bi bi-eye-fill me-2"></i>
            Detail Peminjaman
          </h5>

          <small class="text-white-50">
            Informasi lengkap data mahasiswa dan peminjaman
          </small>
        </div>

        <button type="button"
          class="btn-close btn-close-white"
          data-bs-dismiss="modal"
          aria-label="Close">
        </button>

      </div>

      {{-- BODY --}}
      <div class="modal-body p-4">

        <div class="row g-4">

          {{-- DATA MAHASISWA --}}
          <div class="col-md-12 col-lg-6">

            <div class="alert alert-primary border-0 shadow-sm">
              <i class="bi bi-person-fill me-2"></i>
              <strong>Data Mahasiswa</strong>

              <div class="small mt-1">
                Informasi mahasiswa yang melakukan peminjaman.
              </div>
            </div>

            {{-- IDENTITAS & NAMA --}}
            <div class="row g-3">

              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">
                  Nomor Identitas Mahasiswa
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-card-text text-primary"></i>
                  </span>

                  <input
                    class="form-control bg-light"
                    id="student_identification_number"
                    disabled>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">
                  Nama Mahasiswa
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-person-fill text-primary"></i>
                  </span>

                  <input
                    class="form-control bg-light"
                    id="student_name"
                    disabled>
                </div>
              </div>

            </div>

            {{-- PROGRAM STUDI & KELAS --}}
            <div class="row g-3 mt-1">

              <div class="col-md-6">

                <label class="form-label fw-semibold text-dark">
                  Program Studi
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-bookmarks-fill text-primary"></i>
                  </span>

                  <input
                    class="form-control bg-light"
                    id="program_study_name"
                    disabled>
                </div>

              </div>

              <div class="col-md-6">

                <label class="form-label fw-semibold text-dark">
                  Kelas
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-building-fill text-primary"></i>
                  </span>

                  <input
                    class="form-control bg-light"
                    id="school_class_name"
                    disabled>
                </div>

              </div>

            </div>

            {{-- NOMOR HANDPHONE --}}
            <div class="mt-3">

              <label class="form-label fw-semibold text-dark">
                Nomor Handphone
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light">
                  <i class="bi bi-telephone-fill text-success"></i>
                </span>

                <input
                  class="form-control bg-light"
                  id="student_phone_number"
                  disabled>
              </div>

            </div>

          </div>

          {{-- DATA PEMINJAMAN --}}
          <div class="col-md-12 col-lg-6">

            <div class="alert alert-success border-0 shadow-sm">
              <i class="bi bi-book-fill me-2"></i>
              <strong>Data Peminjaman</strong>

              <div class="small mt-1">
                Informasi lengkap mengenai peminjaman.
              </div>
            </div>

            {{-- KOMODITAS --}}
            <div class="mb-3">

              <label class="form-label fw-semibold text-dark">
                Nama Komoditas
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light">
                  <i class="bi bi-collection-fill text-success"></i>
                </span>

                <input
                  class="form-control bg-light"
                  id="commodity_name"
                  disabled>
              </div>

            </div>

            {{-- TANGGAL --}}
            <div class="mb-3">

              <label class="form-label fw-semibold text-dark">
                Tanggal
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light">
                  <i class="bi bi-calendar-fill text-primary"></i>
                </span>

                <input
                  class="form-control bg-light"
                  id="date"
                  disabled>
              </div>

            </div>

            {{-- JAM --}}
            <div class="row g-3">

              <div class="col-md-6">

                <label class="form-label fw-semibold text-dark">
                  Jam Pinjam
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-clock-fill text-primary"></i>
                  </span>

                  <input
                    class="form-control bg-light"
                    id="time_start"
                    disabled>
                </div>

              </div>

              <div class="col-md-6">

                <label class="form-label fw-semibold text-dark">
                  Jam Kembali
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-clock-fill text-success"></i>
                  </span>

                  <input
                    class="form-control bg-light"
                    id="time_end"
                    disabled>
                </div>

              </div>

            </div>

            {{-- STATUS --}}
            <div class="mt-3">

              <label class="form-label fw-semibold text-dark">
                Status
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light">
                  <i class="bi bi-check-circle-fill text-success"></i>
                </span>

                <input
                  class="form-control bg-light"
                  id="is_returned"
                  disabled>
              </div>

            </div>

            {{-- CATATAN --}}
            <div class="mt-3">

              <label class="form-label fw-semibold text-dark">
                Catatan
              </label>

              <textarea
                class="form-control bg-light"
                id="note"
                disabled
                style="height: 100px"></textarea>

            </div>

          </div>

        </div>

      </div>

      {{-- FOOTER --}}
      <div class="modal-footer bg-light">

        <button
          type="button"
          class="btn btn-secondary close-button"
          data-bs-dismiss="modal">

          <i class="bi bi-x-lg me-1"></i>
          Tutup

        </button>

      </div>

    </div>
  </div>
</div>
```
