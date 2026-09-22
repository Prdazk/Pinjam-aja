```blade
@extends('layouts.app')

@section('title', 'Laporan Peminjaman')
@section('description', 'Halaman Laporan Peminjaman')

@section('content')
<section class="row">
  <div class="col-12">

    @include('utilities.alert')

    <div class="card">

      <div class="card-header">
        <h4 class="card-title">@yield('title')</h4>
      </div>

      <div class="card-body">

        {{-- FILTER --}}
        <x-filter-menu>

          <div class="row">

            {{-- MAHASISWA --}}
            <div class="col-md-4">
              <div class="mb-3">
                <label for="student_id" class="form-label">
                  Mahasiswa:
                </label>

                <select name="student_id" id="student_id" class="form-select">
                  <option value="">Pilih mahasiswa..</option>

                  @foreach ($students as $student)
                    <option
                      value="{{ $student->id }}"
                      @selected(request('student_id') == $student->id)
                    >
                      {{ $student->identification_number }} - {{ $student->name }}
                    </option>
                  @endforeach

                </select>
              </div>
            </div>

            {{-- PROGRAM STUDI --}}
            <div class="col-md-4">
              <div class="mb-3">

                <label for="program_study_id" class="form-label">
                  Program Studi:
                </label>

                <select
                  name="program_study_id"
                  id="program_study_id"
                  class="form-select"
                >
                  <option value="">Pilih program studi..</option>

                  @foreach ($programStudies as $programStudy)
                    <option
                      value="{{ $programStudy->id }}"
                      @selected(request('program_study_id') == $programStudy->id)
                    >
                      {{ $programStudy->name }}
                    </option>
                  @endforeach

                </select>

              </div>
            </div>

            {{-- KELAS --}}
            <div class="col-md-4">
              <div class="mb-3">

                <label for="school_class_id" class="form-label">
                  Kelas:
                </label>

                <select
                  name="school_class_id"
                  id="school_class_id"
                  class="form-select"
                >
                  <option value="">Pilih kelas..</option>

                  @foreach ($schoolClasses as $schoolClass)
                    <option
                      value="{{ $schoolClass->id }}"
                      @selected(request('school_class_id') == $schoolClass->id)
                    >
                      {{ $schoolClass->name }}
                    </option>
                  @endforeach

                </select>

              </div>
            </div>

          </div>


          <div class="row">

            {{-- TANGGAL AWAL --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="start_date" class="form-label">
                  Tanggal Awal:
                </label>

                <div class="input-group">

                  <span class="input-group-text">
                    <i class="bi bi-calendar-date-fill"></i>
                  </span>

                  <input
                    type="date"
                    class="form-control"
                    name="start_date"
                    id="start_date"
                    value="{{ request('start_date') }}"
                  >

                </div>

              </div>
            </div>


            {{-- TANGGAL AKHIR --}}
            <div class="col-md-6">
              <div class="mb-3">

                <label for="end_date" class="form-label">
                  Tanggal Akhir:
                </label>

                <div class="input-group">

                  <span class="input-group-text">
                    <i class="bi bi-calendar-date-fill"></i>
                  </span>

                  <input
                    type="date"
                    class="form-control"
                    name="end_date"
                    id="end_date"
                    value="{{ request('end_date') }}"
                  >

                </div>

              </div>
            </div>

          </div>


          {{-- RESET FILTER --}}
          <x-slot name="resetButtonURL">
            {{ route('administrators.borrowings-report.index') }}
          </x-slot>

        </x-filter-menu>


        {{-- TOMBOL EXPORT --}}
        <div class="d-flex flex-row-reverse pb-3">

          <form
            action="{{ route('administrators.borrowings-report.export') }}"
            method="POST"
          >

            @csrf

            <input
              type="hidden"
              name="start_date"
              value="{{ request('start_date') }}"
            >

            <input
              type="hidden"
              name="end_date"
              value="{{ request('end_date') }}"
            >

            <input
              type="hidden"
              name="program_study_id"
              value="{{ request('program_study_id') }}"
            >

            <input
              type="hidden"
              name="student_id"
              value="{{ request('student_id') }}"
            >

            <input
              type="hidden"
              name="school_class_id"
              value="{{ request('school_class_id') }}"
            >

            <button
              class="btn btn-success"
              type="submit"
            >
              <i class="bi bi-file-earmark-excel-fill"></i>
              Export Excel
            </button>

          </form>

        </div>


        {{-- TABEL --}}
        <div class="table-responsive">

          <table class="table datatable">

            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Buku</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Pinjam</th>
                <th scope="col">Jam Kembali</th>
                <th scope="col">Petugas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>


            <tbody>

              @foreach ($borrowings as $borrowing)

                <tr>

                  {{-- NOMOR --}}
                  <th scope="row">
                    {{ $loop->iteration }}
                  </th>


                  {{-- MAHASISWA --}}
                  <td>

                    <span
                      class="badge text-bg-primary"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      data-bs-title="{{ $borrowing->student->identification_number }}"
                    >
                      {{ $borrowing->student->name }}
                    </span>

                  </td>


                  {{-- BUKU --}}
                  <td>
                    {{ $borrowing->commodity->name }}
                  </td>


                  {{-- TANGGAL --}}
                  <td>
                    {{ $borrowing->getDateFormatted() }}
                  </td>


                  {{-- JAM PINJAM --}}
                  <td>

                    <span class="badge text-bg-secondary">

                      <i class="bi bi-clock-fill"></i>

                      {{ $borrowing->time_start }}

                    </span>

                  </td>


                  {{-- JAM KEMBALI --}}
                  <td>

                    @if ($borrowing->time_end === NULL)

                      <span
                        class="badge text-bg-info"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="Sedang dipinjam"
                      >
                        <i class="bi bi-clock"></i>
                        Sedang Dipinjam
                      </span>

                    @else

                      <span class="badge text-bg-secondary">

                        <i class="bi bi-clock-fill"></i>

                        {{ $borrowing->time_end }}

                      </span>

                    @endif

                  </td>


                  {{-- PETUGAS --}}
                  <td>

                    @if ($borrowing->officer_id !== NULL)

                      <span
                        class="badge text-bg-success"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="Sudah divalidasi oleh {{ $borrowing->officer->name }}"
                      >
                        <i class="bi bi-check-circle"></i>
                        Valid
                      </span>

                    @else

                      <span
                        class="badge text-bg-warning"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="Belum divalidasi oleh petugas"
                      >
                        <i class="bi bi-exclamation-circle"></i>
                        Belum Valid
                      </span>

                    @endif

                  </td>


                  {{-- AKSI --}}
                  <td>

                    <button
                      type="button"
                      class="btn btn-sm btn-success showBorrowingButton"
                      data-bs-toggle="modal"
                      data-id="{{ $borrowing->id }}"
                      data-bs-target="#detailBorrowingModal"
                    >
                      <i class="bi bi-eye-fill"></i>
                    </button>

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
  @include('administrator.borrowing.report.modal.show')
@endpush

{{-- JAVASCRIPT --}}
@push('script')

  @include('administrator.borrowing.script')
@endpush
