<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\PihakTerlibat;
use Illuminate\Http\Request;

class PihakTerlibatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $pengaduan = Pengaduan::find($request->pengaduan_id);
        PihakTerlibat::create($request->all());
        activity()
        ->performedOn($pengaduan)
        ->log('Menambahkan Pihak Terlibat "'. $request->nama.'"');
        return back()->with("toast_success","Berhasil Menambahkan Pihak Terlibat");
    }

    /**
     * Display the specified resource.
     */
    public function show(PihakTerlibat $pihakTerlibat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PihakTerlibat $pihakTerlibat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PihakTerlibat $pihakTerlibat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PihakTerlibat $pihakTerlibat)
    {
        //
    }
}
