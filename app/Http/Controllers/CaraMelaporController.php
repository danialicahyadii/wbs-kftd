<?php

namespace App\Http\Controllers;

use App\Models\CaraMelapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaraMelaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Tutorial!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $tutorial = CaraMelapor::orderBy('no_urut')->get();
        return view('apps.admin.tutorial.index', compact('tutorial'));
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
        // $iconUrl = asset('storage/' . $iconPath);
        $icon = $request->icon_tutorial ?? null;
        if($request->hasFile('icon_tutorial')){
            $iconName = $icon->hashName();
            $iconPath = $icon->storeAs('icon/cara-melapor', $iconName, 'public');
        }
        CaraMelapor::create([
            'no_urut' => $request->no_urut,
            'judul' => $request->judul,
            'detail' => $request->detail,
            'icon' => $iconPath
        ]);
        return back()->with('toast_success', 'Tutorial Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(CaraMelapor $caraMelapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaraMelapor $caraMelapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaraMelapor $caraMelapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaraMelapor $caraMelapor)
    {
        Storage::disk('public')->delete($caraMelapor->icon);
        $caraMelapor->delete();
        return back()->with('toast_success', 'Tutorial Berhasil Dihapus!');
    }
}
