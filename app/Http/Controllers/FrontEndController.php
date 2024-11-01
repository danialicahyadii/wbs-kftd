<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontEndController extends Controller
{
    public function beranda()
    {
        return view('apps.frontend.home', ['status' => session('status')]);
    }

    public function syaratKetentuan()
    {
        return view('apps.syarat-ketentuan');
    }

    public function peraturan()
    {
        return view('apps.frontend.kontak-kami');
    }

    public function faq()
    {
        return view('apps.frontend.faq');
    }

    public function search(Request $request)
    {
        $pengaduan = Pengaduan::where('tiket', $request->tiket)->first();
        if ($pengaduan) {
            return response()->json(['status' => $pengaduan->statusPengaduan->nama, 'id' => Crypt::encrypt($pengaduan->id), 'found' => true]);
        } else {
            return response()->json(['message' => 'Tiket tidak ditemukan.', 'found' => false]);
        }
    }
}
