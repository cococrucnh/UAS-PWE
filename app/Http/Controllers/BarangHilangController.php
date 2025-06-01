<?php

namespace App\Http\Controllers;

use App\Models\BarangHilang;
use Illuminate\Http\Request;

class BarangHilangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $status = $request->input('status');

        $data = BarangHilang::when($query, function($q) use ($query) {
                $q->where('nama_barang', 'like', '%' . $query . '%');
            })
            ->when($status, function($q) use ($status) {
                $q->where('status', $status);
            })
            ->get();

        return view('barang_hilang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang_hilang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\BarangHilang::create($request->all());

        return redirect()->route('barang-hilang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangHilang $barangHilang)
    {
        return view('barang_hilang.show', compact('barangHilang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangHilang $barangHilang)
    {
        return view('barang_hilang.edit', compact('barangHilang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangHilang $barangHilang)
    {
        $barangHilang->update($request->all());
        return redirect()->route('barang-hilang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangHilang $barangHilang)
    {
        $barangHilang->delete();
        return redirect()->route('barang-hilang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
