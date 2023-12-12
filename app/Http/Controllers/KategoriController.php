<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id','asc')->get();
        $n=0;
        return view('v_product.kategori.index', compact('kategori','n'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $val = ['A', 'M', 'BHP', 'BTHP'];
        return view('v_product.kategori.create', compact('val'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kat'=>'required',
            'desc'=>'required', 
        ]);
        $kategori = Kategori::create([
            'kategori'=> $request->kat,
            'deskripsi'=> $request->desc,
        ]);

        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);
        return view("v_product.kategori.show", compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        $selected = Kategori::find($kategori->id);
        $val = ['A', 'M', 'BHP', 'BTHP'];
        return view('v_product.kategori.edit', compact('kategori','selected','val'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kat'    => 'required',
            'desc'     => 'required',
        ]);

        $dkategori = Kategori::find($id);

        $dkategori->update([
            'kategori'    => $request->kat,
            'deskripsi'     => $request->desc,
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kat = Kategori::find($id);
        try {
            $kat->delete();
        } catch (QueryException $exception) {
            return back()
                ->with('error', 'Cannot delete data that have child');
        }
        return redirect()
            ->route('kategori.index')
            ->with('success', 'Data deleted successfully');
    }
}
