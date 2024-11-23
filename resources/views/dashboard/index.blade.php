@extends('layouts.main')

{{-- untuk styles khusus halaman tertentu --}}
@section('this-page-style')
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <!-- tempat button -->
            </div>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($bukus as $buku)
                <div class="col">
                    <div class="card shadow-sm">
                        <!-- Gambar acak dari picsum.photos -->
                        <img src="{{ asset('storage/' . $buku->cover) }}" class="card-img-top" alt="Thumbnail Buku" />

                        <div class="card-body">
                            <!-- Judul Buku -->
                            <h5 class="card-title">{{$buku->judul}}</h5>

                            <!-- Deskripsi Buku -->
                            <p class="card-text">
                                {{$buku->deskripsi}}
                            </p>

                            <!-- Penerbit -->
                            <p class="card-text">
                                <strong>Penerbit:</strong> {{$buku->penulis}}
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        Lihat
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        Edit
                                    </button>
                                </div>
                                <small class="text-body-secondary">{{ $buku->updated_at->format('d-m-Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               

            </div>
        </div>
    </main>
@endsection

{{-- untuk scripts khusus halaman tertentu --}}
@section('this-page-scripts')
@endsection

