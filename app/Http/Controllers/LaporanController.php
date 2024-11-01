<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use App\Mail\Laporan as MailLaporan;
use App\Models\Bukti;
use App\Models\Laporan;
use App\Models\PihakTerlibat;
use App\Models\SaksiSaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::get();
        return view('apps.admin.pengaduan.index', compact('laporan'));
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
    public function store(StoreLaporanRequest $request)
    {
        $data = $request->validated();
        $buktiUrls = [];
        if ($request->hasFile('bukti')) {

            foreach ($request->file('bukti') as $file) {
                $name = $file->getClientOriginalName();

                $bukti = $file->storeAs('bukti/' . $this->generateTicketCode(), $name, 'public');

                $buktiUrls[] = asset('storage/' . $bukti);
            }
        }
        $laporan = Laporan::create([
            'tiket' => $this->generateTicketCode(),
            'user_id' => Auth::user()->id,
            'nama_pelapor' => $request->nama_pelapor,
            'alamat_pelapor' => $request->alamat_pelapor,
            'no_hp_pelapor' => $request->no_hp_pelapor,
            'email_pelapor' => Auth::user()->email,

            'nama_terlapor' => $request->nama_terlapor,
            'jabatan_terlapor' => $request->jabatan_terlapor,
            'unit_terlapor' => $request->unit_terlapor,

            'jenis_pelanggaran' => json_encode($request->jenis_pelanggaran),
            'kronologi' => $request->kronologi,
            'waktu_pelanggaran' => $request->waktu_pelanggaran,
            'tempat_pelanggaran' => $request->tempat_pelanggaran,
            'konsekuensi' => $request->konsekuensi,

            'informasi_lainnya' => $request->informasi_lainnya
        ]);

        $pihakTerlibat = $request->pihak_terlibat ?? null;
        $saksiSaksi = $request->saksi_saksi ?? null;
        $pihakTerlapor = $request->pihak_terlapor ?? null;

        // foreach($pihakTerlapor as $row){
        //     PihakTerlapor::create([
        //         'laporan_id' => $laporan->id,
        //         'nama_terlapor' => $row['nama_terlapor'],
        //         'jabatan_terlapor' => $row['jabatan_terlapor'],
        //         'unit_kerja' => $row['unit_kerja'],
        //     ]);
        // }

        if($pihakTerlibat){
            foreach($pihakTerlibat as $row){
                PihakTerlibat::create([
                    'laporan_id' => $laporan->id,
                    'nama_pihak' => $row['nama_pihak'],
                    'unit_kerja' => $row['unit_kerja'],
                ]);
            }
        }
        if($saksiSaksi){
            foreach($saksiSaksi as $row){
                SaksiSaksi::create([
                    'laporan_id' => $laporan->id,
                    'nama_saksi' => $row['nama_saksi'],
                    'unit_kerja' => $row['unit_kerja'],
                ]);
            }
        }
        if($buktiUrls){
            foreach ($buktiUrls as $url) {
                Bukti::create([
                    'laporan_id' => $laporan->id,
                    'user_id' => Auth::user()->id,
                    'url' => $url,
                ]);
            }

        }
        Mail::to($request->user()->email)->send(new MailLaporan($laporan));
        return redirect('/')->with('success', 'Laporan berhasil dibuat  ');
    }

    private function ticketCodeExists($ticketCode)
    {
        return Laporan::where('tiket', $ticketCode)->exists();
    }

    public function generateTicketCode()
    {
        $dateTime = Carbon::now();

        $year = $dateTime->format('y');
        $month = $dateTime->format('m');
        $day = $dateTime->format('d');

        do {
            $randomNumber = mt_rand(1000, 9999);

            $ticketCode = "{$year}{$month}{$day}{$randomNumber}";

        } while ($this->ticketCodeExists($ticketCode));

        return $ticketCode;
    }

    public function laporanDetail(Request $request)
    {
        if($request->no_ticket){
            $laporan = Laporan::where('tiket', $request->no_ticket)->first();
        }else{

        }
        return view('apps.laporan-detail', compact('laporan'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laporan = Laporan::find(Crypt::decrypt($id));
        return view('apps.admin.pengaduan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanRequest $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Laporan::find($id)->delete();

        return back();
    }
}
