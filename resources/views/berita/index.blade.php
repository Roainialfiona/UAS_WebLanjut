@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Daftar Berita</h1>

<a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $berita)
            <tr>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->kategori->nama_kategori }}</td>
                <td>{{ ucfirst($berita->status) }}</td>
                <td>
                    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>

                    @if(auth()->user()->role == 'editor' && $berita->status == 'draft')
                    <form action="{{ route('berita.approve', $berita->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success btn-sm">Publish</button>
                    </form>
                    @elseif(auth()->user()->role == 'editor' && $berita->status == 'published')
                    <form action="{{ route('berita.unpublish', $berita->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-secondary btn-sm">Unpublish</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
