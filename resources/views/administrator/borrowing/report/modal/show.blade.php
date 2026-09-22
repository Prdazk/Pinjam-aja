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
            Informasi lengkap data peminjaman
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

            <div class="alert alert-primary">
              <i class="bi bi-person-fill me-1"></i>
              Data Mahasiswa
            </div>

            {{-- NOMOR IDENTITAS & NAMA --}}
            <div class="row g-3">

              <div class="col-md-6">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Nomor Identitas Mahasiswa
                  </label>

                  <input class="form-control"
                    id="student_identification_number"
                    disabled>

                </div>

              </div>


              <div class="col-md-6">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Nama Mahasiswa
                  </label>

                  <input class="form-control"
                    id="student_name"
                    disabled>

                </div>

              </div>

            </div>


            {{-- PROGRAM STUDI & KELAS --}}
            <div class="row g-3">

              <div class="col-md-6">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Program Studi
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-bookmarks-fill"></i>
                    </span>

                    <input class="form-control"
                      id="program_study_name"
                      disabled>

                  </div>

                </div>

              </div>


              <div class="col-md-6">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Kelas
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-building-fill"></i>
                    </span>

                    <input class="form-control"
                      id="school_class_name"
                      disabled>

                  </div>

                </div>

              </div>

            </div>


            {{-- NOMOR HANDPHONE --}}
            <div class="row">

              <div class="col-md-12">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Nomor Handphone
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-telephone-fill"></i>
                    </span>

                    <input class="form-control"
                      id="student_phone_number"
                      disabled>

                  </div>

                </div>

              </div>

            </div>

          </div>


          {{-- DATA PEMINJAMAN --}}
          <div class="col-md-12 col-lg-6">

            <div class="alert alert-primary">
              <i class="bi bi-journal-bookmark-fill me-1"></i>
              Data Peminjaman
            </div>


            {{-- NAMA KOMODITAS --}}
            <div class="row">

              <div class="col-md-12">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Nama Komoditas
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-collection-fill"></i>
                    </span>

                    <input class="form-control"
                      id="commodity_name"
                      disabled>

                  </div>

                </div>

              </div>

            </div>


            {{-- TANGGAL --}}
            <div class="row">

              <div class="col-md-12">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Tanggal
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-calendar-fill"></i>
                    </span>

                    <input class="form-control"
                      id="date"
                      disabled>

                  </div>

                </div>

              </div>

            </div>


            {{-- JAM --}}
            <div class="row g-3">

              <div class="col-md-6">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Jam Pinjam
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-clock-fill"></i>
                    </span>

                    <input class="form-control"
                      id="time_start"
                      disabled>

                  </div>

                </div>

              </div>


              <div class="col-md-6">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Jam Kembali
                  </label>

                  <div class="input-group">

                    <span class="input-group-text bg-light">
                      <i class="bi bi-clock-fill"></i>
                    </span>

                    <input class="form-control"
                      id="time_end"
                      disabled>

                  </div>

                </div>

              </div>

            </div>


            {{-- STATUS --}}
            <div class="row">

              <div class="col-md-12">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Status
                  </label>

                  <input class="form-control"
                    id="is_returned"
                    disabled>

                </div>

              </div>

            </div>


            {{-- CATATAN --}}
            <div class="row">

              <div class="col-md-12">

                <div class="mb-3">

                  <label class="form-label fw-semibold">
                    Catatan
                  </label>

                  <textarea class="form-control"
                    id="note"
                    disabled
                    style="height: 100px"></textarea>

                </div>

              </div>

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