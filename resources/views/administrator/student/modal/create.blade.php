```blade
<div class="modal fade" id="createStudentModal" tabindex="-1" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      {{-- HEADER --}}
      <div class="modal-header">

        <h1 class="modal-title fs-5">
          Tambah Mahasiswa
        </h1>

        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close">
        </button>

      </div>


      {{-- BODY --}}
      <div class="modal-body">

        <form
          action="{{ route('administrators.students.store') }}"
          method="POST"
        >

          @csrf


          {{-- NIM & NAMA --}}
          <div class="row">

            <div class="col-md-12 col-lg-4">

              <div class="mb-3">

                <label
                  for="identification_number"
                  class="form-label"
                >
                  NIM Mahasiswa
                </label>

                <input
                  type="number"
                  name="identification_number"
                  id="identification_number"
                  class="form-control @error('identification_number', 'store') is-invalid @enderror"
                  value="{{ old('identification_number') }}"
                  placeholder="Masukkan NIM mahasiswa.."
                  required
                >

                @error('identification_number', 'store')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>


            <div class="col-md-12 col-lg-8">

              <div class="mb-3">

                <label
                  for="name"
                  class="form-label"
                >
                  Nama Mahasiswa
                </label>

                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control @error('name', 'store') is-invalid @enderror"
                  value="{{ old('name') }}"
                  placeholder="Masukkan nama mahasiswa.."
                  required
                >

                @error('name', 'store')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>

          </div>


          {{-- PROGRAM STUDI & KELAS --}}
          <div class="row">

            <div class="col-md-12 col-lg-6">

              <div class="mb-3">

                <label
                  for="program_study_id"
                  class="form-label"
                >
                  Program Studi
                </label>

                <select
                  name="program_study_id"
                  id="program_study_id"
                  class="form-select @error('program_study_id', 'store') is-invalid @enderror"
                  required
                >

                  <option value="">
                    Pilih program studi..
                  </option>

                  @foreach ($programStudies as $programStudy)

                    <option
                      value="{{ $programStudy->id }}"
                      @selected(old('program_study_id') == $programStudy->id)
                    >
                      {{ $programStudy->name }}
                    </option>

                  @endforeach

                </select>

                @error('program_study_id', 'store')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>


            <div class="col-md-12 col-lg-6">

              <div class="mb-3">

                <label
                  for="school_class_id"
                  class="form-label"
                >
                  Kelas
                </label>

                <select
                  name="school_class_id"
                  id="school_class_id"
                  class="form-select @error('school_class_id', 'store') is-invalid @enderror"
                  required
                >

                  <option value="">
                    Pilih kelas..
                  </option>

                  @foreach ($schoolClasses as $schoolClass)

                    <option
                      value="{{ $schoolClass->id }}"
                      @selected(old('school_class_id') == $schoolClass->id)
                    >
                      {{ $schoolClass->name }}
                    </option>

                  @endforeach

                </select>

                @error('school_class_id', 'store')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>

          </div>


          {{-- EMAIL & NOMOR HP --}}
          <div class="row">

            <div class="col-md-12 col-lg-6">

              <div class="mb-3">

                <label
                  for="email"
                  class="form-label"
                >
                  Alamat Email
                </label>

                <div class="input-group">

                  <span class="input-group-text">
                    <i class="bi bi-envelope-at-fill"></i>
                  </span>

                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control @error('email', 'store') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="Masukkan alamat email.."
                    required
                  >

                </div>

                @error('email', 'store')
                  <div class="d-block invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>


            <div class="col-md-12 col-lg-6">

              <div class="mb-3">

                <label
                  for="phone_number"
                  class="form-label"
                >
                  Nomor Handphone
                </label>

                <div class="input-group">

                  <span class="input-group-text">
                    <i class="bi bi-telephone-fill"></i>
                  </span>

                  <input
                    type="number"
                    name="phone_number"
                    id="phone_number"
                    class="form-control @error('phone_number', 'store') is-invalid @enderror"
                    value="{{ old('phone_number') }}"
                    placeholder="Masukkan nomor handphone.."
                    required
                  >

                </div>

                @error('phone_number', 'store')
                  <div class="d-block invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>

          </div>


          {{-- PASSWORD --}}
          <div class="row">

            <div class="col-md-12 col-lg-6">

              <div class="mb-3">

                <label
                  for="password"
                  class="form-label"
                >
                  Password
                </label>

                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control @error('password', 'store') is-invalid @enderror"
                  placeholder="Masukkan password.."
                  required
                >

                @error('password', 'store')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>


            <div class="col-md-12 col-lg-6">

              <div class="mb-3">

                <label
                  for="password_confirmation"
                  class="form-label"
                >
                  Konfirmasi Password
                </label>

                <input
                  type="password"
                  name="password_confirmation"
                  id="password_confirmation"
                  class="form-control @error('password_confirmation', 'store') is-invalid @enderror"
                  placeholder="Ulangi password.."
                  required
                >

                @error('password_confirmation', 'store')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

            </div>

          </div>


          {{-- FOOTER --}}
          <div class="modal-footer">

            <button
              type="button"
              class="btn btn-secondary close-button"
              data-bs-dismiss="modal"
            >
              Tutup
            </button>

            <button
              type="submit"
              class="btn btn-success"
            >
              <i class="bi bi-plus-circle-fill"></i>
              Tambah
            </button>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>