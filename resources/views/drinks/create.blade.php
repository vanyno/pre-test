@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Minuman</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form untuk menyimpan data minuman -->
    <form action="{{ route('drinks.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nama Minuman</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol untuk menyimpan data -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- Link untuk kembali ke halaman daftar minuman -->
    <a href="{{ route('drinks.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
