@extends('layout')
@section('title', 'Buat Saldo')
@section('content')
    <form action="{{ route('saldo.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Nama pemilik Saldo</label>
            <input type="text" name="nama" id="" class="form-control" placeholder="Nama pemilik saldo">
        </div>
        <div class="form-group mb-3">
            <label for="">Saldo</label>
            <input type="number" name="saldo" id="" class="form-control" placeholder="Jumlah Saldo">
        </div>
        <button class="btn btn-primary" type="submit">Tambah Transaksi</button>
    </form>

@endsection
