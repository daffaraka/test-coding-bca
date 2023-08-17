@extends('layout')
@section('title', 'Buat Transaksi')
@section('content')
<form action="{{ route('saldo.update',$saldo->id) }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="">Nama pemilik Saldo</label>
        <input type="text" name="nama" id="" class="form-control" value="{{$saldo->nama}}" placeholder="Nama pemilik saldo">
    </div>
    <div class="form-group mb-3">
        <label for="">Saldo</label>
        <input type="number" name="saldo" id="" class="form-control" value="{{$saldo->saldo }}" placeholder="Jumlah Saldo">
    </div>
    <button class="btn btn-primary" type="submit">Tambah Transaksi</button>
</form>
@endsection
