@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <img src="{{ Storage::url('villas/'.$villa->gambar) }}" class="card-img-top" alt="{{ $villa->nama }}">
        <div class="card-body">
            <h2>{{ $villa->nama }}</h2>
            <p>
                <i class="fas fa-map-marker-alt"></i> {{ $villa->lokasi }}<br>
                <i class="fas fa-star text-warning"></i> {{ $villa->rating }}/5<br>
                <strong class="text-primary">Rp {{ number_format($villa->harga) }} / malam</strong>
            </p>
            
            <h4>Deskripsi</h4>
            <p>{{ $villa->deskripsi }}</p>
            
            <a href="{{ route('villas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection