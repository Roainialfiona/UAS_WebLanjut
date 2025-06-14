@extends('layouts.app')

@section('content')
<h1>Tambah Berita</h1>

<form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Isi</label>
        <textarea name="isi" class="form-control" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
