<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
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
        Barangkeluar::create([
            'tgl_keluar'     => $request->tgl,
            'qty_keluar'      => $request->qty,
            'barang_id'   => $request->barang,
        ]);
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barangkeluar $barangkeluar)
    {
        //
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

        $dBarangkeluar->update([
            'tgl_keluar'    => $request->tgl,
            'qty_keluar'     => $request->qty,
            'barang_id'  => $request->barang,
        ]);

        //redirect to index
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barangkeluar $barangkeluar)
    {
        //
    }
}
