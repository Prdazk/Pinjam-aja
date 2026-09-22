@extends('layouts.app')

@section('title', 'Beranda')
@section('description', 'Halaman Beranda')

@section('content')

<div class="container-fluid">

{{-- STATISTIK --}}
<div class="row g-4 mb-4">

    {{-- ADMIN --}}
    <div class="col-12 col-md-4">
        <a href="{{ route('administrators.users.index') }}"
           class="text-decoration-none">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Admin</p>
                            <h2 class="fw-bold mb-0">
                                {{ $counts['administrator'] }}
                            </h2>
                        </div>

                        <div class="stats-icon blue">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- SISWA --}}
    <div class="col-12 col-md-4">
        <a href="{{ route('administrators.students.index') }}"
           class="text-decoration-none">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Siswa</p>
                            <h2 class="fw-bold mb-0">
                                {{ $counts['student'] }}
                            </h2>
                        </div>

                        <div class="stats-icon green">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- KOMODITAS --}}
    <div class="col-12 col-md-4">
        <a href="{{ route('administrators.commodities.index') }}"
           class="text-decoration-none">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Komoditas</p>
                            <h2 class="fw-bold mb-0">
                                {{ $counts['commodity'] }}
                            </h2>
                        </div>

                        <div class="stats-icon red">
                            <i class="iconly-boldBookmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>


{{-- KONTEN UTAMA --}}
<div class="row g-4">

    {{-- GRAFIK --}}
    <div class="col-12 col-lg-8">
        <div class="card h-100 shadow-sm">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1">Data Peminjaman</h4>
                        <small class="text-muted">
                            Grafik peminjaman berdasarkan tahun
                        </small>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="mb-4">
                    <label for="year" class="form-label fw-bold">
                        Pilih Tahun
                    </label>

                    <input
                        type="number"
                        id="year"
                        value="{{ date('Y') }}"
                        placeholder="Masukkan tahun..."
                        class="form-control"
                    >

                    <small class="text-muted">
                        Tekan <strong>Enter</strong> untuk menampilkan
                        data berdasarkan tahun.
                    </small>
                </div>

                <div id="chart-borrowing-by-year"></div>

            </div>
        </div>
    </div>


    {{-- SIDEBAR --}}
    <div class="col-12 col-lg-4">

        {{-- PROFIL ADMIN --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <div class="d-flex align-items-center">
                    <div class="stats-icon blue me-3">
                        <i class="iconly-boldProfile"></i>
                    </div>

                    <div>
                        <p class="text-muted mb-1">
                            Administrator
                        </p>

                        <h5 class="fw-bold mb-1">
                            {{ auth('administrator')->user()->name }}
                        </h5>

                        <small class="text-muted">
                            {{ auth('administrator')->user()->email }}
                        </small>
                    </div>
                </div>

            </div>
        </div>


        {{-- SISWA TERBARU --}}
        <div class="card shadow-sm">

            <div class="card-header">
                <h4 class="mb-0">
                    Siswa Terbaru
                </h4>
            </div>

            <div class="card-content">

                @foreach ($latestRegisteredStudents as $student)

                    <div class="d-flex align-items-center px-4 py-3 border-bottom">

                        <div class="stats-icon green me-3">
                            <i class="iconly-boldProfile"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1">
                                {{ $student->name }}
                            </h6>

                            <small class="text-muted">
                                {{ $student->email }}
                            </small>
                        </div>

                    </div>

                @endforeach

                <div class="p-4">

                    <a href="{{ route('administrators.students.index') }}"
                       class="btn btn-primary w-100">
                        Lihat Semua Siswa
                    </a>

                </div>

            </div>
        </div>

    </div>

</div>
```

</div>

@endsection

@push('script')
@include('administrator.script')
@endpush
