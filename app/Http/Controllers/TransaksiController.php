<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function index()
    {
        $transaksi = Transaksi::with('saldo')->get();

        return view('transaksi.transaksi-index', compact('transaksi'));
    }

    public function create()
    {
        $saldo = Saldo::all();
        return view('transaksi.transaksi-create', compact('saldo'));
    }


    public function store(Request $request)
    {
        $saldo = Saldo::find($request->saldo_id);

        if ($request->jenis == 'Kredit') {
            if ($saldo->saldo < $request->nominal) {
                return redirect()->back()->with('error', 'Saldo tidak mencukup untuk melakukan kredit');
            } else {
                $saldo->saldo -= $request->nominal;
                $saldo->save();
            }
        } else {
            $saldo->saldo += $request->nominal;
            $saldo->save();
        }

        Transaksi::create($request->all());

        return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil ditambahkan');
    }



    public function edit($id)
    {
        $transaksi = Transaksi::find($id);

        return view('transaksi.transaksi-edit', compact('transaksi'));
    }


    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::with('saldo')->find($id);

        $saldo = Saldo::find($transaksi->saldo_id);
        // Cek jika jenis nya kredit
        if ($request->jenis == 'Kredit') {
            // Cek saldo awal dan di bandingkan dengan nominal
            if ($saldo->saldo < $request->nominal) {
                // Jika saldo kurang
                return redirect()->back()->with('error', 'Saldo tidak mencukup untuk melakukan kredit');
            } else {
                // Jika saldo lebih dan di cek jika nominal transaksi di edit lebih kecil
                //  dari pada nominal yang akan di update
                // Kredit = Minus
                if ($request->nominal > $transaksi->nominal) {
                    $saldo->saldo -= $request->nominal - $transaksi->nominal;

                    $saldo->save();
                } else if ($transaksi->nominal == $request->nominal) {
                    $saldo->save();
                } else {
                    $saldo->saldo += $transaksi->nominal - $request->nominal;
                    $saldo->save();
                }
            }
        } else {
            // Jika jenis nya adalah debet
            // Debet = Plus
            if ($request->nominal > $transaksi->nominal) {
                $saldo->saldo += $request->nominal - $transaksi->nominal;
                $saldo->save();
            } else if ($transaksi->nominal == $request->nominal) {
                $saldo->save();
            } else {
                $saldo->saldo -=   $transaksi->nominal - $request->nominal;
                $saldo->save();
            }
        }

        $transaksi->update($request->all());
        return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil diperbarui');
    }


    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil dihapus');
    }
}
