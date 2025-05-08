<!-- resources/views/kategori/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
  <h2 class="mb-4">Tambah Kategori</h2>
  <form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama_kategori" class="form-label">Nama Kategori</label>
      <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required>
    </div>
    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
@endsection