@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah atau Tipe Peminjaman')
@section('description', 'Halaman daftar mata kuliah atau tipe peminjaman')

@section('content')

<section class="row">

  <div class="col-12">

```
@include('utilities.alert')

<div class="card">

  {{-- Header --}}
  <div class="card-header">
    <h4 class="card-title">
      Daftar Mata Kuliah atau Tipe Peminjaman
    </h4>
  </div>

  {{-- Body --}}
  <div class="card-body">

    {{-- Tombol --}}
    <div class="mb-3">

      <button
        type="button"
        class="btn btn-success me-1"
        data-bs-toggle="modal"
        data-bs-target="#importModal"
      >
        <i class="bi bi-file-excel"></i>
        Impor Excel
      </button>

      <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#createSubjectModal"
      >
        <i class="bi bi-plus-circle-fill"></i>
        Tambah Mata Kuliah atau Tipe Peminjaman
      </button>

    </div>

    {{-- Tabel --}}
    <div class="table-responsive">

      <table class="table table-bordered table-hover datatable">

        <thead>
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          @forelse ($subjects as $subject)

            <tr>

              <td>
                {{ $loop->iteration }}
              </td>

              <td>
                <span class="badge text-bg-primary">
                  {{ $subject->code }}
                </span>
              </td>

              <td>
                {{ $subject->name }}
              </td>

              <td>

                <div class="btn-group gap-1">

                  {{-- Edit --}}
                  <button
                    type="button"
                    class="btn btn-sm btn-success editSubjectButton"
                    data-bs-toggle="modal"
                    data-id="{{ $subject->id }}"
                    data-bs-target="#editSubjectModal"
                  >
                    <i class="bi bi-pencil-fill"></i>
                  </button>

                  {{-- Hapus --}}
                  <form
                    action="{{ route('administrators.subjects.destroy', $subject) }}"
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
              <td colspan="4" class="text-center">
                Belum ada data mata kuliah atau tipe peminjaman.
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

@include('administrator.subject.modal.create')

@include('administrator.subject.modal.edit')

@include('administrator.subject.modal.import')

@endpush

{{-- JavaScript --}}
@push('script')

@include('administrator.subject.script')

@endpush