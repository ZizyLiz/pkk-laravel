<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dBarang = Barang::with('kategori')->orderBy('id','asc')->paginate(10);
        $n = 0;
        return view('v_product.barang.barang', compact('dBarang','n'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('v_product.barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'merk'      => 'required',
            'seri'  => 'required',
            'specs'      => 'required',
            'stok'     => 'required',
            'kategori'     => 'required',
        ]);
        //create post
        Barang::create([
            'merk'     => $request->merk,
            'seri'      => $request->seri,
            'spesifikasi'   => $request->specs,
            'stok'    => $request->stok,
            'kategori_id' => $request->kategori,
        ]);

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Barang = Kategori::all();
        $dBarang = Barang::find($id);
        $selected = Kategori::find($dBarang->kategori_id);
        return view('v_product.barang.edit',compact('dBarang','Barang','selected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'merk'    => 'required',
            'seri'     => 'required',
            'specs'  => 'required',
            'kategori'  => 'required',
        ]);

        $dBarang = Barang::find($id);

        $dBarang->update([
            'merk'    => $request->merk,
            'seri'     => $request->seri,
            'spesifikasi'  => $request->specs,
            'kategori_id'  => $request->kategori,
        ]);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        try {
            $barang->delete();
        } catch (QueryException $exception) {
            return back()
                ->with('error', 'Cannot delete data that have child');
        }
     
        return redirect()
            ->route('kategori.index')
            ->with('message', 'Data deleted successfully');
    }
}
