@extends('layouts.main')

{{-- untuk styles khusus halaman tertentu --}}
@section('this-page-style')
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Buku - Tambah</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <!-- tempat button -->
            </div>
        </div>
        <div class="container mt-4">
            <form action="{{ route('master.data.buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Kategori -->
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori_id" required>
                        <option selected disabled value="">Pilih Kategori...</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Judul -->
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" required />
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>

                <!-- Penulis -->
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" required />
                </div>

                <!-- Cover -->
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Buku</label>
                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*" />
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option selected disabled value="">Pilih Status...</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

{{-- untuk scripts khusus halaman tertentu --}}
@section('this-page-scripts')
@endsection
