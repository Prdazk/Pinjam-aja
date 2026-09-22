blade
@extends('layouts.app')

@section('title', 'Peminjaman Hari Ini')
@section('description', 'Halaman Daftar Peminjaman Hari Ini')

@section('content')
<section class="row">
  <div class="col-12">

    @include('utilities.alert')

    <div class="card">

      {{-- HEADER --}}
      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>

      <div class="card-body">

        {{-- INFORMASI --}}
        <div class="alert alert-warning" role="alert">
          <i class="bi bi-exclamation-circle me-1"></i>

          Setiap data peminjaman dari mahasiswa wajib dilakukan validasi oleh petugas
          dengan menekan tombol validasi pada data di tabel.

          Silahkan lakukan validasi jika jam kembali sudah terisi.
          Jika jam kembali sudah terisi, berarti komoditas yang dipinjam telah
          dikembalikan oleh mahasiswa tersebut.

          <div class="fw-bold pt-3">
            Sebelum melakukan validasi, petugas diharapkan melakukan pengecekan
            terhadap komoditas yang telah dipinjam untuk memastikan benar-benar
            sudah dikembalikan.
          </div>
        </div>

        {{-- FILTER --}}
        <x-filter-menu>

          {{-- BARIS 1 --}}
          <div class="row">

            {{-- MAHASISWA --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="student_id" class="form-label">
                  Mahasiswa:
                </label>

                <select name="student_id"
                  id="student_id"
                  class="form-select">

                  <option value="">
                    Pilih mahasiswa..
                  </option>

                  @foreach ($students as $student)

                  <option value="{{ $student->id }}"
                    @selected(request('student_id') == $student->id)>
                    {{ $student->identification_number }} -
                    {{ $student->name }}
                  </option>

                  @endforeach

                </select>

              </div>
            </div>

            {{-- STATUS PENGEMBALIAN --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="status" class="form-label">
                  Status Pengembalian:
                </label>

                <select name="status"
                  id="status"
                  class="form-select">

                  <option value=""
                    @selected(request('status') === '')>
                    Pilih status pengembalian..
                  </option>

                  <option value="1"
                    @selected(request('status') === '1')>
                    Sudah dikembalikan
                  </option>

                  <option value="0"
                    @selected(request('status') === '0')>
                    Belum dikembalikan
                  </option>

                </select>

              </div>
            </div>

          </div>

          {{-- BARIS 2 --}}
          <div class="row">

            {{-- STATUS VALIDASI --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="validate" class="form-label">
                  Status Validasi:
                </label>

                <select name="validate"
                  id="validate"
                  class="form-select">

                  <option value=""
                    @selected(request('validate') === '')>
                    Pilih status validasi..
                  </option>

                  <option value="1"
                    @selected(request('validate') === '1')>
                    Sudah divalidasi
                  </option>

                  <option value="0"
                    @selected(request('validate') === '0')>
                    Belum divalidasi
                  </option>

                </select>

              </div>
            </div>

            {{-- KOMODITAS --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="commodity_id" class="form-label">
                  Komoditas:
                </label>

                <select name="commodity_id"
                  id="commodity_id"
                  class="form-select">

                  <option value="">
                    Pilih komoditas..
                  </option>

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

          {{-- RESET FILTER --}}
          <x-slot name="resetButtonURL">
            {{ route('administrators.borrowings.index') }}
          </x-slot>

        </x-filter-menu>


        {{-- TABEL --}}
        <div class="table-responsive">

          <table class="table datatable">

            {{-- TABLE HEADER --}}
            <thead class="table-light">
              <tr>

                <th scope="col"
                  class="text-center"
                  style="width: 60px;">
                  No
                </th>

                <th scope="col"
                  class="text-center">
                  Nama Mahasiswa
                </th>

                <th scope="col"
                  class="text-center">
                  Komoditas
                </th>

                <th scope="col"
                  class="text-center">
                  Tanggal
                </th>

                <th scope="col"
                  class="text-center">
                  Jam Pinjam
                </th>

                <th scope="col"
                  class="text-center">
                  Jam Kembali
                </th>

                <th scope="col"
                  class="text-center">
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

                {{-- NO --}}
                <th scope="row"
                  class="text-center">
                  {{ $loop->iteration }}
                </th>


                {{-- NAMA MAHASISWA --}}
                <td class="text-center">

                  <span class="badge text-bg-primary"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="{{ $borrowing->student->identification_number }}">

                    {{ $borrowing->student->name }}

                  </span>

                </td>


                {{-- KOMODITAS --}}
                <td class="text-center">
                  {{ $borrowing->commodity->name }}
                </td>


                {{-- TANGGAL --}}
                <td class="text-center">
                  {{ $borrowing->getDateFormatted() }}
                </td>


                {{-- JAM PINJAM --}}
                <td class="text-center">

                  <span class="badge text-bg-secondary">

                    <i class="bi bi-clock-fill me-1"></i>

                    {{ $borrowing->time_start }}

                  </span>

                </td>


                {{-- JAM KEMBALI --}}
                <td class="text-center">

                  @if($borrowing->time_end === NULL)

                  <span class="badge text-bg-info"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="Sedang dipinjam">

                    <i class="bi bi-clock"></i>

                  </span>

                  @else

                  <span class="badge text-bg-secondary">

                    <i class="bi bi-clock-fill me-1"></i>

                    {{ $borrowing->time_end }}

                  </span>

                  @endif

                </td>


                {{-- PETUGAS --}}
                <td class="text-center">

                  @if($borrowing->officer_id !== NULL)

                  <span class="badge text-bg-success"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="Sudah divalidasi oleh {{ $borrowing->officer->name }}">

                    <i class="bi bi-check-circle"></i>

                  </span>

                  @else

                  <span class="badge text-bg-warning"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="Belum divalidasi oleh petugas!">

                    <i class="bi bi-exclamation-circle"></i>

                  </span>

                  @endif

                </td>


                {{-- AKSI --}}
                <td class="text-center">

                  <div class="btn-group gap-1">

                    <button type="button"
                      class="btn btn-sm btn-success showBorrowingButton"
                      data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}"
                      data-bs-target="#detailBorrowingModal">

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

@include('administrator.borrowing.main.modal.show')

@endpush


{{-- SCRIPT --}}
@push('script')

@include('administrator.borrowing.script')

@endpush