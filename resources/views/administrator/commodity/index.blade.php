```blade
@extends('layouts.app')

@section('title', 'Daftar Komoditas')
@section('description', 'Halaman daftar komoditas')

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
              <i class="bi bi-box-seam-fill text-secondary me-2"></i>
              @yield('title')
            </h4>

            <small class="text-muted">
              Kelola data komoditas sistem
            </small>
          </div>

          <div class="d-flex gap-2">

            {{-- IMPOR EXCEL --}}
            <button type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#importModal">
              <i class="bi bi-file-excel me-1"></i>
              Impor Excel
            </button>

            {{-- TAMBAH KOMODITAS --}}
            <button type="button"
              class="btn btn-success"
              id="createCommodityButton"
              data-bs-toggle="modal"
              data-bs-target="#createCommodityModal">
              <i class="bi bi-plus-circle-fill me-1"></i>
              Tambah Komoditas
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
                  Nama Komoditas
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

              @foreach ($commodities as $commodity)

              <tr>

                {{-- NOMOR --}}
                <th scope="row" class="text-center">
                  <span class="badge bg-secondary px-2 py-2">
                    {{ $loop->iteration }}
                  </span>
                </th>

                {{-- NAMA KOMODITAS --}}
                <td class="text-center">
                  <span class="badge bg-primary bg-opacity-10 text-dark px-3 py-2 fw-semibold">
                    <i class="bi bi-box-seam-fill text-primary me-1"></i>
                    {{ $commodity->name }}
                  </span>
                </td>

                {{-- AKSI --}}
                <td class="text-center">
                  <div class="d-inline-flex gap-1">

                    {{-- EDIT --}}
                    <button type="button"
                      class="btn btn-sm btn-primary editCommodityButton"
                      style="width: 38px; height: 32px;"
                      data-bs-toggle="modal"
                      data-id="{{ $commodity->id }}"
                      data-bs-target="#editCommodityModal"
                      title="Edit Komoditas">
                      <i class="bi bi-pencil-fill"></i>
                    </button>

                    {{-- HAPUS --}}
                    <form
                      action="{{ route('administrators.commodities.destroy', $commodity) }}"
                      method="POST"
                      class="d-inline">
                      @csrf
                      @method('DELETE')

                      <button type="submit"
                        class="btn btn-sm btn-danger btn-delete"
                        style="width: 38px; height: 32px;"
                        title="Hapus Komoditas">
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
@include('administrator.commodity.modal.create')
@include('administrator.commodity.modal.edit')
@include('administrator.commodity.modal.import')
@endpush

{{-- SCRIPT --}}
@push('script')
@include('administrator.commodity.script')
@endpush
```
