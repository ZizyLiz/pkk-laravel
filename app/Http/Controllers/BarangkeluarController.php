<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangkeluar = Barangkeluar::with('barang')->orderBy('id','asc')->get();
        $n = 0;
        return view("v_product.barangkeluar.index", compact('barangkeluar', 'n'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        return view('v_product.barangkeluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl' => 'required',
            'qty' => 'required',
            'barang' => 'required',
        ]);
        try {
        Barangkeluar::create([
            'tgl_keluar'     => $request->tgl,
            'qty_keluar'      => $request->qty,
            'barang_id'   => $request->barang,
        ]);
    } catch (QueryException $e) {
        return back()->with(['error'=> 'Jumlah barang keluar melebihi stok yang ada!']);
    }
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);
        return view("v_product.barangkeluar.show", compact('barang'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::all();
        $barangkeluar = Barangkeluar::find($id);
        $selected = Barang::find($barangkeluar->barang_id);
        return view('v_product.barangkeluar.edit', compact('barang','barangkeluar','selected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tgl'    => 'required',
            'qty'     => 'required',
            'barang'  => 'required',
        ]);

        $dBarangkeluar = Barangkeluar::find($id);
        try{
            $dBarangkeluar->update([
                'tgl_keluar'    => $request->tgl,
                'qty_keluar'     => $request->qty,
                'barang_id'  => $request->barang,
            ]);
        }catch(QueryException $exeption){
            return back()->with(['error'=> 'Jumlah melebihi stok barang yang ada!']);
        }


        //redirect to index
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangkeluar = Barangkeluar::find($id)
        ->delete();
        return back()->with(['success'=> 'Berhasil dihapus']);
    }
}
