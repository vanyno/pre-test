@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Foods</h1>
    <a href="{{ route('foods.create') }}" class="btn btn-primary mb-3">Tambah Makanan</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->description }}</td>
                    <td>{{ $food->price }}</td>
                    <td>
                        <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus makanan ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
