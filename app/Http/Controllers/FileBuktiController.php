<?php

namespace App\Http\Controllers;

use App\Models\FileBukti;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileBuktiController extends Controller
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
        $file = $request->file('file');
        $nama_file = $request->nama_file;
        $tipe = $file->getClientOriginalExtension();
        $namaFile = $nama_file.'.'.$tipe;
        $path = $file->storeAs('bukti/' . $pengaduan->tiket, $namaFile, 'public');
        $ukuran = $file->getSize();

        FileBukti::create([
            'pengaduan_id' => $pengaduan->id,
            'nama' => $nama_file,
            'ukuran' => PengaduanController::formatSize($ukuran),
            'tipe' => $tipe,
            'path' => $path
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FileBukti $fileBukti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileBukti $fileBukti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileBukti $fileBukti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileBukti $fileBukti)
    {
        $fullPath = storage_path('app/public/'.$fileBukti->path);
        $fileBukti->delete();
        if (file_exists($fullPath)) {
            unlink($fullPath);
            return back();
        } else {
            return back()->with('error', 'File Tidak Ada');
        }
    }
}
