@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('reseps.create') }}">Tambah Resep</a>
    <h1>Daftar Resep</h1>
    <ul>
        @foreach($reseps as $resep)
        <li>
            <strong>{{ $resep->nama }}</strong>
            <p>{{ $resep->deskripsi }}</p>
            <a href="{{ route('reseps.edit', $resep) }}">Edit</a>
            <a href="{{ route('reseps.cetak') }}" class="btn btn-primary">Unduh PDF</a>
            <form action="{{ route('reseps.destroy', $resep) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection
