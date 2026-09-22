```blade
@extends('layouts.app')

@section('title', 'Daftar Admin')
@section('description', 'Halaman daftar Admin')

@section('content')
<section class="row">
  <div class="col-12">

    @include('utilities.alert')

    <div class="card border-0 shadow-sm">

      {{-- HEADER --}}
      <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">

          <div>
            <h4 class="card-title mb-1 fw-bold">
              <i class="bi bi-people-fill text-secondary me-2"></i>
              @yield('title')
            </h4>

            <small class="text-muted">
              Kelola data admin sistem
            </small>
          </div>

          <button type="button"
            class="btn btn-success"
            data-bs-toggle="modal"
            data-bs-target="#createAdministratorModal">
            <i class="bi bi-plus-circle-fill me-1"></i>
            Tambah Admin
          </button>

        </div>
      </div>

      {{-- TABLE --}}
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-hover align-middle datatable">

            {{-- TABLE HEADER --}}
            <thead class="table-light">
              <tr>
                <th scope="col" class="text-center" style="width: 60px;">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Handphone</th>
                <th scope="col" class="text-center" style="width: 100px;">Aksi</th>
              </tr>
            </thead>

            {{-- TABLE BODY --}}
            <tbody>

              @foreach ($administrators as $user)

              <tr>

                {{-- NOMOR --}}
                <th scope="row" class="text-center">
                  <span class="badge bg-secondary px-2 py-2">
                    {{ $loop->iteration }}
                  </span>
                </th>

                {{-- NAMA --}}
                <td>
                  <span class="badge bg-primary bg-opacity-10 text-dark px-3 py-2 fw-semibold">
                    <i class="bi bi-person-fill text-primary me-1"></i>
                    {{ $user->name }}
                  </span>
                </td>

                {{-- EMAIL --}}
                <td>
                  <span class="badge bg-info bg-opacity-10 text-dark px-3 py-2 fw-semibold">
                    <i class="bi bi-envelope-fill text-info me-1"></i>
                    {{ $user->email }}
                  </span>
                </td>

                {{-- NOMOR HANDPHONE --}}
                <td>
                  <span class="badge bg-success bg-opacity-10 text-dark px-3 py-2 fw-semibold">
                    <i class="bi bi-telephone-fill text-success me-1"></i>
                    {{ $user->phone_number }}
                  </span>
                </td>

                {{-- AKSI --}}
                <td class="text-center">
                  <div class="d-inline-flex gap-1">

                    {{-- EDIT --}}
                    <button type="button"
                      class="btn btn-sm btn-primary text-white editAdministratorButton"
                      style="width: 38px; height: 32px;"
                      data-bs-toggle="modal"
                      data-id="{{ $user->id }}"
                      data-bs-target="#editAdministratorModal"
                      title="Edit Admin">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    {{-- HAPUS --}}
                    <form
                      action="{{ route('administrators.users.destroy', $user) }}"
                      method="POST"
                      class="d-inline">
                      @csrf
                      @method('DELETE')

                      <button type="submit"
                        class="btn btn-sm btn-danger btn-delete"
                        style="width: 38px; height: 32px;"
                        title="Hapus Admin">
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
@include('administrator.user.modal.create')
@include('administrator.user.modal.edit')
@endpush

{{-- SCRIPT --}}
@push('script')
@include('administrator.user.script')
@endpush
```
