<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Terlapor;
use Illuminate\Http\Request;

class TerlaporController extends Controller
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
        Terlapor::create($request->all());
        activity()
            ->performedOn($pengaduan)
            ->log('Menambahkan Terlapor '. $request->nama);
        return back()->with('toast_success', 'Terlapor Ditambahkan!');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Terlapor $terlapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terlapor $terlapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terlapor $terlapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terlapor $terlapor)
    {
        //
    }
}
