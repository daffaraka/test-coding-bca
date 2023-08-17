@extends('layout')
@section('title', 'Transaksi')
@section('content')
    <div class="container">
        @include('flash')
        <h3 class="text-center">Transaksi</h3>

        <a href="{{route('transaksi.create')}}" class="btn btn-info mb-3">Tambah Data Transaksi</a>
        <div class="table-responsive">
            <table
                class="table table-striped
            table-hover
            table-border
            table-light
            align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nasabah</th>
                        <th>Nominal</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Pukul</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->saldo->nama}}</td>
                            <td> Rp. {{number_format($item->nominal,2,',','.') }}</td>
                            <td> <button class="btn btn-{{$item->jenis == 'Debet' ? 'success' : 'warning'}}"> {{ $item->jenis }}</button></td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->waktu}}</td>
                            <td><a href="{{route('transaksi.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('transaksi.delete',$item->id)}}" class="btn btn-danger">Hapus</a>
                            </td>

                        </tr>
                    @empty
                        Tidak ada data transaksi
                    @endforelse


                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
