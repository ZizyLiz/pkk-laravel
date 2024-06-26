<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangmasuk = Barangmasuk::with('barang')->orderBy('id','asc')->get();
        $n = 0;
        return view("v_product.barangmasuk.index", compact('barangmasuk', 'n'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $s = " - ";
        return view('v_product.barangmasuk.create', compact('barang','s'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl'      => 'required',
            'qty'  => 'required',
            'barang'      => 'required',
        ]);
        //create post
        Barangmasuk::create([
            'tgl_masuk'     => $request->tgl,
            'qty_masuk'      => $request->qty,
            'barang_id'   => $request->barang,
        ]);

        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barangmasuk::find($id);
        return view("v_product.barangmasuk.show", compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::all();
        $barangmasuk = Barangmasuk::find($id);
        $selected = Barang::find($barangmasuk->barang_id);
        return view('v_product.barangmasuk.edit', compact('barang','barangmasuk','selected'));
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

        $dBarangmasuk = Barangmasuk::find($id);

        $dBarangmasuk->update([
            'tgl_masuk'    => $request->tgl,
            'qty_masuk'     => $request->qty,
            'barang_id'  => $request->barang,
        ]);

        //redirect to index
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dBarangmasuk = Barangmasuk::find($id);
        $dBarangmasuk->delete();
        return redirect()->route('barangmasuk.index')->with(['success'=> 'Record Berhasil dihapus!']);
    }
}
