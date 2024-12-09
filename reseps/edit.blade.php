@extends('layouts.app')

@section('content')
<div>
    <h1>Edit Resep</h1>
    <form action="{{ route('reseps.update', $resep) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $resep->nama }}" required>
        
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required>{{ $resep->deskripsi }}</textarea>
        
        <label>Bahan:</label>
        <textarea name="bahan" required>{{ $resep->bahan }}</textarea>
        
        <label>Langkah:</label>
        <textarea name="langkah" required>{{ $resep->langkah }}</textarea>
        
        <button type="submit">Update</button>
    </form>
</div>
@endsection
