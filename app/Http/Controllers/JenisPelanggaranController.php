<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;

class JenisPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutorial = JenisPelanggaran::get();
        $title = 'Delete Jenis Pelanggaran!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('apps.admin.jenis_pelanggaran.index', compact('tutorial'));
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
        JenisPelanggaran::create($request->all());
        return back()->with('toast_success', 'Jenis Pelanggaran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPelanggaran $jenisPelanggaran)
    {
        $jenisPelanggaran->delete();
        return back()->with('toast_success', 'Berhasil Dihapus!');
    }
}
