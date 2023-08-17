@extends('layout')
@section('title', 'Buat Transaksi')
@section('content')
    @include('flash')
    <form action="{{ route('transaksi.update',$transaksi->id) }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Jenis Transaksi</label>
            <input type="text" name="jenis" value="{{$transaksi->jenis}}" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Nominal</label>
            <input type="number" name="nominal" value="{{$transaksi->nominal}}" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Tanggal Transaksi</label>
            <input type="date" name="tanggal" value="{{$transaksi->tanggal}}" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Waktu Transaksi</label>
            <input type="time" name="waktu" value="{{$transaksi->waktu}}"  class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Update Transaksi</button>
    </form>

@endsection
