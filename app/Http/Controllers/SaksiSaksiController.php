<?php

namespace App\Http\Controllers;

use App\Models\SaksiSaksi;
use Illuminate\Http\Request;

class SaksiSaksiController extends Controller
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
        SaksiSaksi::create($request->all());
        return back()->with('toast_success', 'Saksi Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SaksiSaksi $saksiSaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaksiSaksi $saksiSaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaksiSaksi $saksiSaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaksiSaksi $saksiSaksi)
    {
        //
    }
}
