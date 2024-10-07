@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Drinks</h1>
    <a href="{{ route('drinks.create') }}" class="btn btn-primary mb-3">Tambah Minuman</a>
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
            @foreach ($drinks as $drink)
                <tr>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $drink->description }}</td>
                    <td>{{ $drink->price }}</td>
                    <td>
                        <a href="{{ route('drinks.edit', $drink->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('drinks.destroy', $drink->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus minuman ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
