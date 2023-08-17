@extends('layout')
@section('title', 'Saldo')
@section('content')
    <div class="container">
        @include('flash')
        <h3 class="text-center">Saldo</h3>

        <a href="{{route('saldo.create')}}" class="btn btn-info mb-3">Tambah Data Saldo</a>
        <div class="table-responsive">
            <table
                class="table table-striped
            table-hover
            table-border
            table-primary
            align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Saldo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($saldo as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>Rp. {{number_format($item->saldo,2,',','.') }}</td>
                            <td><a href="{{route('saldo.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('saldo.delete',$item->id)}}" class="btn btn-danger">Hapus</a>
                            </td>

                        </tr>
                    @empty
                        Tidak ada data saldo
                    @endforelse


                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
