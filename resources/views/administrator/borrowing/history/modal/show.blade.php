```blade
<div class="modal fade" id="detailBorrowingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 shadow">

      {{-- HEADER --}}
      <div class="modal-header bg-dark text-white">
        <div>
          <h5 class="modal-title mb-1 text-white">
            <i class="bi bi-journal-text me-2"></i>
            Detail Peminjaman
          </h5>

          <small class="text-white-50">
            Informasi lengkap data peminjaman buku
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

          {{-- DATA SISWA --}}
          <div class="col-lg-6">

            <div class="alert alert-primary mb-4">
              <i class="bi bi-person-vcard-fill me-2"></i>
              <strong>Data Siswa</strong>
              <br>
              <small>
                Informasi siswa yang melakukan peminjaman.
              </small>
            </div>

            {{-- NOMOR IDENTITAS & NAMA --}}
            <div class="row g-3">

              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">
                  Nomor Identitas Siswa
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-person-badge-fill"></i>
                  </span>

                  <input class="form-control bg-light"
                    id="student_identification_number"
                    disabled>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">
                  Nama Siswa
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-person-fill"></i>
                  </span>

                  <input class="form-control bg-light"
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
                    <i class="bi bi-bookmarks-fill"></i>
                  </span>

                  <input class="form-control bg-light"
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
                    <i class="bi bi-building-fill"></i>
                  </span>

                  <input class="form-control bg-light"
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
                  <i class="bi bi-telephone-fill"></i>
                </span>

                <input class="form-control bg-light"
                  id="student_phone_number"
                  disabled>
              </div>
            </div>

          </div>

          {{-- DATA PEMINJAMAN --}}
          <div class="col-lg-6">

            <div class="alert alert-success mb-4">
              <i class="bi bi-journal-bookmark-fill me-2"></i>
              <strong>Data Peminjaman</strong>
              <br>
              <small>
                Informasi lengkap buku yang dipinjam.
              </small>
            </div>

            {{-- NAMA BUKU --}}
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark">
                Nama Buku
              </label>

              <div class="input-group">
                <span class="input-group-text bg-light">
                  <i class="bi bi-book-fill"></i>
                </span>

                <input class="form-control bg-light"
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
                  <i class="bi bi-calendar-fill"></i>
                </span>

                <input class="form-control bg-light"
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
                    <i class="bi bi-clock-fill"></i>
                  </span>

                  <input class="form-control bg-light"
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
                    <i class="bi bi-clock-fill"></i>
                  </span>

                  <input class="form-control bg-light"
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
                  <i class="bi bi-check-circle-fill"></i>
                </span>

                <input class="form-control bg-light"
                  id="is_returned"
                  disabled>
              </div>
            </div>

            {{-- CATATAN --}}
            <div class="mt-3">
              <label class="form-label fw-semibold text-dark">
                Catatan
              </label>

              <textarea class="form-control bg-light"
                id="note"
                disabled
                style="height: 100px"></textarea>
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

      </div>

    </div>
  </div>
</div>
```
