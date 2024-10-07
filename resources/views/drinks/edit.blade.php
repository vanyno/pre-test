@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Minuman</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('drinks.update', $drink->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan metode PUT untuk memperbarui -->
        
        <div class="form-group">
            <label for="name">Nama Minuman</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $drink->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $drink->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $drink->price) }}" required>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('drinks.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
