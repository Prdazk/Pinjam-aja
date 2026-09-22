```blade
@extends('layouts.app')

@section('title', 'Daftar Kelas')
@section('description', 'Halaman daftar kelas')

@section('content')
<section class="row">
  <div class="col-12">

    @include('utilities.alert')

    <div class="card border-0 shadow-sm">

      {{-- HEADER --}}
      <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">

          <div>
            <h4 class="card-title mb-1">
              <i class="bi bi-door-open-fill text-secondary me-2"></i>
              @yield('title')
            </h4>

            <small class="text-muted">
              Kelola data kelas sekolah
            </small>
          </div>

          <div class="d-flex gap-2">

            {{-- IMPOR --}}
            <button type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#importModal">
              <i class="bi bi-file-excel me-1"></i>
              Impor Excel
            </button>

            {{-- TAMBAH --}}
            <button type="button"
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#createSchoolClassModal">
              <i class="bi bi-plus-circle-fill me-1"></i>
              Tambah Kelas
            </button>

          </div>

        </div>
      </div>

      {{-- TABLE --}}
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-hover align-middle datatable">

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
                  Nama Kelas
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

              @foreach ($schoolClasses as $schoolClass)

              <tr>

                {{-- NOMOR --}}
                <th scope="row" class="text-center">
                  <span class="badge bg-secondary px-2 py-2">
                    {{ $loop->iteration }}
                  </span>
                </th>

                {{-- NAMA KELAS --}}
                <td class="text-center">
                  <span class="badge bg-primary bg-opacity-10 text-dark px-3 py-2">
                    <i class="bi bi-door-open-fill text-primary me-1"></i>
                    {{ $schoolClass->name }}
                  </span>
                </td>

                {{-- AKSI --}}
                <td class="text-center">
                  <div class="d-inline-flex gap-1">

                    {{-- EDIT --}}
                    <button type="button"
                      class="btn btn-sm btn-primary editSchoolClassButton"
                      style="width: 38px; height: 32px;"
                      data-bs-toggle="modal"
                      data-id="{{ $schoolClass->id }}"
                      data-bs-target="#editSchoolClassModal"
                      title="Edit Kelas">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    {{-- HAPUS --}}
                    <form
                      action="{{ route('administrators.school-classes.destroy', $schoolClass) }}"
                      method="POST"
                      class="d-inline">

                      @csrf
                      @method('DELETE')

                      <button type="submit"
                        class="btn btn-sm btn-danger btn-delete"
                        style="width: 38px; height: 32px;"
                        title="Hapus Kelas">
                        <i class="bi bi-trash-fill"></i>
                      </button>

                    </form>

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
@include('administrator.school_class.modal.create')
@include('administrator.school_class.modal.edit')
@include('administrator.school_class.modal.import')
@endpush

{{-- SCRIPT --}}
@push('script')
@include('administrator.school_class.script')
@endpush
