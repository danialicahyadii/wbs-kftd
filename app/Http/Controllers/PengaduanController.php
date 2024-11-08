<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Laporan as MailPengaduan;
use App\Models\FileBukti;
use App\Models\PihakTerlibat;
use App\Models\SaksiSaksi;
use App\Models\Terlapor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        if(Auth::user()->roles()->first()->name == 'Admin'){
            $pengaduan = Pengaduan::get();
        }else{
            $pengaduan = Pengaduan::where('user_id', Auth::user()->id)->get();
        }
        return view('apps.admin.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.admin.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all(), $request->bukti[0]['nama_file']);
        // $data = $request->validated();
        $noTiket = $this->generateTicketCode();

        $pengaduan = Pengaduan::create([
            'tiket' => $noTiket,
            'user_id' => Auth::user()->id,
            'nama_pelapor' => $request->nama_pelapor,
            'alamat_pelapor' => $request->alamat_pelapor,
            'no_hp_pelapor' => $request->no_hp_pelapor,
            'email_pelapor' => Auth::user()->email,
            'jenis_pelanggaran' => json_encode($request->jenis_pelanggaran),
            'kronologi' => $request->kronologi,
            'waktu_pelanggaran' => $request->waktu_pelanggaran,
            'tempat_pelanggaran' => $request->tempat_pelanggaran,
            'konsekuensi' => $request->konsekuensi,
            'status' => 1,
        ]);

        $terlapor = $request->terlapor ?? null;
        $pihakTerlibat = $request->terlibat ?? null;
        $saksiSaksi = $request->saksi ?? null;

        foreach ($terlapor as $row) {
            Terlapor::create([
                'pengaduan_id' => $pengaduan->id,
                'nama' => $row['nama'],
                'jabatan' => $row['jabatan'],
                'unit' => $row['unit'],
            ]);
        }

        if ($pihakTerlibat) {
            foreach ($pihakTerlibat as $row) {
                PihakTerlibat::create([
                    'pengaduan_id' => $pengaduan->id,
                    'nama' => $row['nama'],
                    'jabatan' => $row['jabatan'],
                    'unit' => $row['unit'],
                ]);
            }
        }
        if ($saksiSaksi) {
            foreach ($saksiSaksi as $row) {
                SaksiSaksi::create([
                    'pengaduan_id' => $pengaduan->id,
                    'nama' => $row['nama'],
                    'jabatan' => $row['jabatan'],
                    'unit' => $row['unit'],
                ]);
            }
        }
        if ($request->file('bukti')) {
            foreach ($request->bukti as $file) {
                $nama = $file['nama_file'];
                $tipe = $file['file']->getClientOriginalExtension();
                $namaFile = $nama.'.'.$tipe;
                $bukti = $file['file']->storeAs('bukti/' . $noTiket, $namaFile, 'public');
                $ukuran = $file['file']->getSize();

                FileBukti::create([
                    'pengaduan_id' => $pengaduan->id,
                    'nama' => $nama,
                    'tipe' => $tipe,
                    'ukuran' => $this->formatSize($ukuran),
                    'path' => $bukti
                    // 'url' => asset('storage/' . $bukti)
                ]);
            }
        }

        Mail::to($request->user()->email)->send(new MailPengaduan($pengaduan));
        Alert::success('Success Title', 'Success Message');
        return redirect('pengaduan')->with('success', 'Laporan berhasil dibuat  ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laporan = Pengaduan::find(Crypt::decrypt($id));
        return view('apps.admin.pengaduan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return back();
    }

    /**
     * Check the Tiket Exists.
     */
    private function ticketExists($ticket)
    {
        return Pengaduan::where('tiket', $ticket)->exists();
    }

    /**
     * Check the Tiket Exists.
     */
    public static function formatSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }

    /**
     * Generate random ticket.
     */
    public function generateTicketCode()
    {
        $dateTime = Carbon::now();

        $year = $dateTime->format('y');
        $month = $dateTime->format('m');
        $day = $dateTime->format('d');

        do {
            $randomNumber = mt_rand(1000, 9999);

            $ticket = "{$year}{$month}{$day}{$randomNumber}";
        } while ($this->ticketExists($ticket));

        return $ticket;
    }

    public function download(Request $request)
    {
        $fullPath = storage_path('app/public/' . $request->filePath);


        if (file_exists($fullPath)) {
            return response()->download($fullPath);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }
}
