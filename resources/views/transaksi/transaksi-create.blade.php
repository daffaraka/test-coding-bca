@extends('layout')
@section('title', 'Buat Transaksi')
@section('content')
    @include('flash')
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Nasabah pelaku transaksi</label>
            <select name="saldo_id" class="form-control" id="nasabah">
                @foreach ($saldo as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group mb-3">
            <label for="">Sisa Saldo Sekarang</label>
            <input type="number" id="saldo_sekarang" readonly>
        </div> --}}
        <div class="form-group mb-3">
            <label for="">Jenis Transaksi</label>
            <select name="jenis" class="form-control" id="nasabah">
                <option value="Debet">Debet</option>
                <option value="Kredit">Kredit</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="">Nominal</label>
            <input type="number" name="nominal" id="" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Tanggal Transaksi</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Waktu Transaksi</label>
            <input type="time" name="waktu" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Tambah Transaksi</button>
    </form>

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        var triggerEl = document.querySelector('#navId a')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
    </script>

    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <script>
        $('#nasabah').select2({})
    </script>
@endpush
