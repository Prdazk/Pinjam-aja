@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')
@section('description', 'Halaman daftar mahasiswa')

@section('content')

<section class="row">
  <div class="col-12">

```
@include('utilities.alert')

<div class="card">

  <div class="card-header">
    <h4 class="card-title">Daftar Mahasiswa</h4>
  </div>

  <div class="card-body">

    {{-- Tombol Tambah --}}
    <div class="mb-3">
      <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#createStudentModal"
      >
        <i class="bi bi-plus-circle-fill"></i>
        Tambah Mahasiswa
      </button>
    </div>

    {{-- Filter --}}
    <x-filter-menu>

      <div class="row">

        {{-- Program Studi --}}
        <div class="col-md-6">
          <div class="mb-3">

            <label for="program_study_id" class="form-label">
              Program Studi
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

        {{-- Kelas --}}
        <div class="col-md-6">
          <div class="mb-3">

            <label for="school_class_id" class="form-label">
              Kelas
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

      <x-slot name="resetButtonURL">
        {{ route('administrators.students.index') }}
      </x-slot>

    </x-filter-menu>

    {{-- Tabel --}}
    <div class="table-responsive">

      <table class="table table-bordered table-hover datatable">

        <thead>
          <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          @forelse ($students as $student)

            <tr>

              <td>
                {{ $loop->iteration }}
              </td>

              <td>
                <span class="badge text-bg-primary">
                  {{ $student->identification_number }}
                </span>
              </td>

              <td>
                {{ $student->name }}
              </td>

              <td>
                {{ $student->programStudy->name }}
              </td>

              <td>
                {{ $student->schoolClass->name }}
              </td>

              <td>

                <div class="btn-group gap-1">

                  {{-- Detail --}}
                  <button
                    type="button"
                    class="btn btn-sm btn-primary showStudentButton"
                    data-bs-toggle="modal"
                    data-id="{{ $student->id }}"
                    data-bs-target="#detailStudentModal"
                  >
                    <i class="bi bi-eye-fill"></i>
                  </button>

                  {{-- Edit --}}
                  <button
                    type="button"
                    class="btn btn-sm btn-success editStudentButton"
                    data-bs-toggle="modal"
                    data-id="{{ $student->id }}"
                    data-bs-target="#editStudentModal"
                  >
                    <i class="bi bi-pencil-fill"></i>
                  </button>

                  {{-- Hapus --}}
                  <form
                    action="{{ route('administrators.students.destroy', $student) }}"
                    method="POST"
                  >
                    @csrf
                    @method('DELETE')

                    <button
                      type="submit"
                      class="btn btn-sm btn-danger btn-delete"
                    >
                      <i class="bi bi-trash-fill"></i>
                    </button>

                  </form>

                </div>

              </td>

            </tr>

          @empty

            <tr>
              <td colspan="6" class="text-center">
                Belum ada data mahasiswa.
              </td>
            </tr>

          @endforelse

        </tbody>

      </table>

    </div>

  </div>

</div>
```

  </div>
</section>
@endsection

{{-- Modal --}}
@push('modal')

@include('administrator.student.modal.create')

@include('administrator.student.modal.show')

@include('administrator.student.modal.edit')

@endpush

{{-- JavaScript --}}
@push('script')

@include('administrator.student.script')

@endpush
