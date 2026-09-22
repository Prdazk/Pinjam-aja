@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')
@section('description', 'Halaman Daftar Riwayat Peminjaman')

@section('content')
<section class="row">
  <div class="col-12">

    <div class="card border-0 shadow-sm">

      {{-- HEADER --}}
      <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">

          <div>
            <h4 class="card-title mb-1">
              <i class="bi bi-clock-history text-secondary me-2"></i>
              @yield('title')
            </h4>

            <small class="text-muted">
              Kelola dan lihat riwayat peminjaman mahasiswa
            </small>
          </div>

        </div>
      </div>

      <div class="card-body">

        {{-- INFORMASI --}}
        <div class="alert alert-info border-0 shadow-sm" role="alert">
          <i class="bi bi-info-circle-fill me-2"></i>
          Tabel di bawah adalah daftar riwayat peminjaman yang sudah dilakukan oleh mahasiswa.
        </div>

        {{-- FILTER --}}
        <x-filter-menu>

          <div class="row">

            {{-- TANGGAL --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label for="date" class="form-label fw-semibold">
                  <i class="bi bi-calendar-date-fill me-1"></i>
                  Tanggal
                </label>

                <div class="input-group">
                  <span class="input-group-text bg-light">
                    <i class="bi bi-calendar-date-fill text-secondary"></i>
                  </span>

                  <input type="date"
                    name="date"
                    id="date"
                    class="form-control"
                    value="{{ request('date') }}"
                    placeholder="Pilih tanggal">
                </div>
              </div>
            </div>

            {{-- MAHASISWA --}}
            <div class="col-md-6">
              <div class="mb-3">
                <label for="student_id" class="form-label fw-semibold">
                  <i class="bi bi-person-fill me-1"></i>
                  Mahasiswa
                </label>

                <select name="student_id" id="student_id" class="form-select">
                  <option value="">Pilih mahasiswa</option>

                  @foreach ($students as $student)
                  <option value="{{ $student->id }}"
                    @selected(request('student_id') == $student->id)>
                    {{ $student->identification_number }} - {{ $student->name }}
                  </option>
                  @endforeach

                </select>
              </div>
            </div>

          </div>

          <div class="row">

            {{-- STATUS PENGEMBALIAN --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="status" class="form-label fw-semibold">
                  <i class="bi bi-arrow-return-left me-1"></i>
                  Status Pengembalian
                </label>

                <select name="status" id="status" class="form-select">
                  <option value="" @selected(request('status') === '')>
                    Pilih status pengembalian
                  </option>

                  <option value="1" @selected(request('status') === '1')>
                    Sudah dikembalikan
                  </option>

                  <option value="0" @selected(request('status') === '0')>
                    Belum dikembalikan
                  </option>
                </select>

              </div>
            </div>

            {{-- STATUS VALIDASI --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="validate" class="form-label fw-semibold">
                  <i class="bi bi-check-circle-fill me-1"></i>
                  Status Validasi
                </label>

                <select name="validate" id="validate" class="form-select">
                  <option value="" @selected(request('validate') === '')>
                    Pilih status validasi
                  </option>

                  <option value="1" @selected(request('validate') === '1')>
                    Sudah divalidasi
                  </option>

                  <option value="0" @selected(request('validate') === '0')>
                    Belum divalidasi
                  </option>
                </select>

              </div>
            </div>

          </div>

          {{-- KOMODITAS --}}
          <div class="row">

            <div class="col-md-6">
              <div class="mb-3">

                <label for="commodity_id" class="form-label fw-semibold">
                  <i class="bi bi-book-fill me-1"></i>
                  Komoditas
                </label>

                <select name="commodity_id" id="commodity_id" class="form-select">
                  <option value="">Pilih komoditas</option>

                  @foreach ($commodities as $commodity)
                  <option value="{{ $commodity->id }}"
                    @selected(request('commodity_id') == $commodity->id)>
                    {{ $commodity->name }}
                  </option>
                  @endforeach

                </select>

              </div>
            </div>

          </div>

          <x-slot name="resetButtonURL">
            {{ route('administrators.borrowings-history.index') }}
          </x-slot>

        </x-filter-menu>

        {{-- TABLE --}}
        <div class="table-responsive mt-4">

          <table class="table table-hover align-middle datatable">

            {{-- TABLE HEADER --}}
            <thead class="table-light">

              <tr>

                <th scope="col"
                  class="text-center"
                  style="width: 60px;">
                  No
                </th>

                <th scope="col" class="text-center">
                  Nama Mahasiswa
                </th>

                <th scope="col" class="text-center">
                  Komoditas
                </th>

                <th scope="col" class="text-center">
                  Tanggal
                </th>

                <th scope="col" class="text-center">
                  Jam Pinjam
                </th>

                <th scope="col" class="text-center">
                  Jam Kembali
                </th>

                <th scope="col" class="text-center">
                  Petugas
                </th>

                <th scope="col"
                  class="text-center"
                  style="width: 100px;">
                  Aksi
                </th>

              </tr>

            </thead>

            {{-- TABLE BODY --}}
            <tbody>

              @foreach ($borrowings as $borrowing)

              <tr>

                {{-- NOMOR --}}
                <th scope="row" class="text-center">
                  <span class="badge bg-secondary px-2 py-2">
                    {{ $loop->iteration }}
                  </span>
                </th>

                {{-- MAHASISWA --}}
                <td class="text-center">

                  <span
                    class="badge bg-primary bg-opacity-10 text-dark px-3 py-2"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="{{ $borrowing->student->identification_number }}">

                    <i class="bi bi-person-fill text-primary me-1"></i>
                    {{ $borrowing->student->name }}

                  </span>

                </td>

                {{-- KOMODITAS --}}
                <td class="text-center">

                  <span class="badge bg-info bg-opacity-10 text-dark px-3 py-2">

                    <i class="bi bi-book-fill text-info me-1"></i>
                    {{ $borrowing->commodity->name }}

                  </span>

                </td>

                {{-- TANGGAL --}}
                <td class="text-center">

                  <span class="badge bg-light text-dark border px-3 py-2">

                    <i class="bi bi-calendar-date-fill text-secondary me-1"></i>
                    {{ $borrowing->getDateFormatted() }}

                  </span>

                </td>

                {{-- JAM PINJAM --}}
                <td class="text-center">

                  <span class="badge bg-secondary px-3 py-2">

                    <i class="bi bi-clock-fill me-1"></i>
                    {{ $borrowing->time_start }}

                  </span>

                </td>

                {{-- JAM KEMBALI --}}
                <td class="text-center">

                  @if($borrowing->time_end === NULL)

                    <span
                      class="badge bg-warning text-dark px-3 py-2"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-title="Sedang dipinjam">

                      <i class="bi bi-clock me-1"></i>
                      Belum kembali

                    </span>

                  @else

                    <span class="badge bg-success px-3 py-2">

                      <i class="bi bi-clock-fill me-1"></i>
                      {{ $borrowing->time_end }}

                    </span>

                  @endif

                </td>

                {{-- PETUGAS --}}
                <td class="text-center">

                  @if($borrowing->officer_id !== NULL)

                    <span
                      class="badge bg-success px-3 py-2"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-title="Sudah divalidasi oleh {{ $borrowing->officer->name }}">

                      <i class="bi bi-check-circle-fill me-1"></i>
                      Valid

                    </span>

                  @else

                    <span
                      class="badge bg-warning text-dark px-3 py-2"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-title="Belum divalidasi oleh petugas">

                      <i class="bi bi-exclamation-circle-fill me-1"></i>
                      Belum

                    </span>

                  @endif

                </td>

                {{-- AKSI --}}
                <td class="text-center">

                  <div class="d-inline-flex gap-1">

                    <button
                      type="button"
                      class="btn btn-sm btn-primary showBorrowingButton"
                      style="width: 38px; height: 32px;"
                      data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}"
                      data-bs-target="#detailBorrowingModal"
                      title="Lihat Detail">

                      <i class="bi bi-eye-fill"></i>

                    </button>

                  </div>

                </td>

              </tr>

              @endforeach

            </tbody>

          </table>

        </div>

      </div>
    </div>

  </div>
</section>
@endsection

{{-- MODAL --}}
@push('modal')
@include('administrator.borrowing.history.modal.show')
@endpush

{{-- SCRIPT --}}
@push('script')
@include('administrator.borrowing.script')
@endpush