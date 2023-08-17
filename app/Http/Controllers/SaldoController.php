<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $saldo = Saldo::all();

        return view('saldo.saldo-index',compact('saldo'));
    }

    public function create()
    {
        return view('saldo.saldo-create');
    }


    public function store(Request $request)
    {
        // Menggunakan create($request->all()) karena antara request dan field pada saldo
        // sudah sama jadi bisa langsung
        Saldo::create($request->all());

        return redirect()->route('saldo')->with('success','Data saldo berhasil ditambahkan');
    }



    public function edit($id)
    {
        $saldo = Saldo::find($id);

        return view('saldo.saldo-edit',compact('saldo'));
    }


    public function update(Request $request, $id)
    {
        $saldo = Saldo::find($id);

        $saldo->update($request->all());
        return redirect()->route('saldo')->with('success','Data saldo berhasil diperbarui');

    }


    public function destroy($id)
    {
        $saldo = Saldo::find($id);
        $saldo->delete();

        return redirect()->route('saldo')->with('success','Data saldo berhasil dihapus');

    }
}
