@extends('layouts.app')

@section('content')

<div class="mb-5">
    <h1 class="fw-bold mb-2" style="font-size: 32px;">👋 Halo, {{ Auth::user()->name }}!</h1>
    <p class="text-muted mb-4" style="font-size: 16px;">Selamat datang kembali di Portal Berita PRO</p>
</div>

<div class="row mb-5">
    <div class="col-md-4">
        <div class="rounded-4 p-4 text-center shadow border-0"
            style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
            <div style="font-size: 18px;">Total Berita</div>
            <div style="font-size: 48px; font-weight: bold;">{{ $totalBerita ?? 0 }}</div>
        </div>
    </div>
</div>

<h4 class="fw-semibold mb-4" style="font-size: 22px;">📰 Berita Terpublish</h4>

<div class="row g-4">
    @forelse ($publishedBerita as $berita)
    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">
            @if($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" height="200" style="object-fit: cover;">
            @endif
            <div class="card-body">
                <h5 class="fw-bold mb-2">{{ $berita->judul }}</h5>
                <span class="badge" style="background: linear-gradient(to right, #ff416c, #ff4b2b); color: white;">
                    {{ $berita->kategori->nama_kategori }}
                </span>
                <p class="text-muted mt-3" style="font-size: 14px;">{{ Str::limit($berita->isi, 100) }}</p>
            </div>
        </div>
    </div>
    @empty
    <p class="text-muted">Belum ada berita yang terpublish.</p>
    @endforelse
</div>

@endsection
