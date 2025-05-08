@extends('layouts.app')

@section('content')
  <h2 class="mb-4">Daftar Kategori</h2>
  <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">+ Tambah Kategori</a>

  @if (session('success'))
      <p style="color: green;">{{ session('success') }}</p>
  @endif

  <table class="table table-bordered table-striped">
      <thead class="table-dark">
      <tr>
          <th>No</th>
          <th>Nama Kategori</th>
          <th>Slug</th>
          <th>Keterangan</th>
          <th>Dibuat</th>
          <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($kategoris as $kategori)
      <tr>
      <td>{{ $loop->iteration }}. {{ $kategori->name }}</td>          <td>{{ $kategori->nama_kategori }}</td>
          <td>{{ $kategori->slug }}</td>
          <td>{{ $kategori->keterangan }}</td>
          <td>{{ $kategori->created_at->format('d-m-Y') }}</td>
          <td>
              <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm">Hapus</button>
              </form>
          </td>
      </tr>
      @endforeach
      </tbody>
  </table>
@endsection