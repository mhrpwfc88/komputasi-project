@extends('layouts.main')

 {{-- untuk styles khusus halaman tertentu --}}
 @section('this-page-style')
 @endsection

 @section('content')
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <div
             class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
             <h1 class="h2">Kategori - Tambah</h1>
             <div class="btn-toolbar mb-2 mb-md-0">
                 <!-- tempat button -->
             </div>
         </div>
         <div class="container mt-4">
             <form action="{{ route('master.data.kategori.store') }}" method="POST">
                 @csrf
                 <!-- Kategori -->
                 <div class="mb-3">
                     <label for="category" class="form-label">Kategori</label>
                     <input type="text" class="form-control" id="category" name="nama" required />
                 </div>

                 <!-- Keterangan (Text Area) -->
                 <div class="mb-3">
                     <label for="description" class="form-label">Keterangan</label>
                     <textarea class="form-control" id="description" name="keterangan" rows="3" required></textarea>
                 </div>

                 <!-- Status (select option) -->
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
     