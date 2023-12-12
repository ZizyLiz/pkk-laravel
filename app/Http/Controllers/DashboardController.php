<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $barangmasuk = Barangmasuk::count();
        $barangkeluar = Barangkeluar::count();
        $kategori = Kategori::count();
        return view("v_product.dashboard", compact("barang","barangmasuk","barangkeluar","kategori"));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
