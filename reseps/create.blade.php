@extends('layouts.app')

@section('content')
<div>
    <h1>Tambah Resep</h1>
    <form action="{{ route('reseps.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required>
        
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>
        
        <label>Bahan:</label>
        <textarea name="bahan" required></textarea>
        
        <label>Langkah:</label>
        <textarea name="langkah" required></textarea>
        
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
