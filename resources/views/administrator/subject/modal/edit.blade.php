<div class="modal fade" id="editSubjectModal" tabindex="-1" aria-hidden="true">

  <div class="modal-dialog">

```
<div class="modal-content">

  {{-- Header --}}
  <div class="modal-header">

    <h5 class="modal-title">
      Ubah Mata Kuliah
    </h5>

    <button
      type="button"
      class="btn-close"
      data-bs-dismiss="modal"
      aria-label="Close">
    </button>

  </div>

  {{-- Body --}}
  <div class="modal-body">

    <form action="#" method="POST">

      @csrf
      @method('PUT')

      {{-- Kode --}}
      <div class="mb-3">

        <label for="code" class="form-label">
          Kode Mata Kuliah
        </label>

        <input
          type="text"
          name="code"
          id="code"
          class="form-control"
          placeholder="Masukkan kode mata kuliah.."
          required
        >

      </div>

      {{-- Nama --}}
      <div class="mb-3">

        <label for="name" class="form-label">
          Nama Mata Kuliah
        </label>

        <input
          type="text"
          name="name"
          id="name"
          class="form-control"
          placeholder="Masukkan nama mata kuliah.."
          required
        >

      </div>

      {{-- Footer --}}
      <div class="modal-footer px-0 pb-0">

        <button
          type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Tutup
        </button>

        <button
          type="submit"
          class="btn btn-success"
        >
          Ubah
        </button>
      </div>
    </form>
  </div>
</div>
</div>
</div>