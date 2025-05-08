@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="4">{{ $kategori->keterangan }}</textarea>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection