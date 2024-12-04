<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Laporan as MailPengaduan;
use App\Mail\Status;
use App\Models\FileBukti;
use App\Models\JenisPelanggaran;
use App\Models\Komentar;
use App\Models\PihakTerlibat;
use App\Models\SaksiSaksi;
use App\Models\Terlapor;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Activitylog\Models\Activity;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = '';
        $role = Auth::user()->getRoleName();
        if($role == 'Admin'){
            $pengaduan = Pengaduan::get();
        }else{
            $pengaduan = Pengaduan::where('user_id', Auth::user()->id)->get();
        }
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
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
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'alamat_pelapor' => 'nullable|string|max:255',
            'no_hp_pelapor' => 'nullable|numeric|digits_between:10,15',
            'jenis_pelanggaran' => 'required|array|min:1',
            'kronologi' => 'required|string',
            'waktu_pelanggaran' => 'required|date',
            'tempat_pelanggaran' => 'required|string|max:255',
            'konsekuensi' => 'nullable|string|max:255',
            'terlapor' => 'nullable|array|min:1', // Minimal 1 terlapor
            'terlapor.*.nama' => 'required|string|max:255',
            'terlapor.*.jabatan' => 'required|string|max:255',
            'terlapor.*.unit' => 'required|string|max:255',
            'terlibat' => 'nullable|array',
            'terlibat.*.nama' => 'nullable|string|max:255',
            'terlibat.*.jabatan' => 'nullable|string|max:255',
            'terlibat.*.unit' => 'nullable|string|max:255',
            'saksi' => 'nullable|array',
            'saksi.*.nama' => 'nullable|string|max:255',
            'saksi.*.jabatan' => 'nullable|string|max:255',
            'saksi.*.unit' => 'nullable|string|max:255',
            'bukti' => 'nullable|array',
            'bukti.*.file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:10240',
            'bukti.*.nama_file' => 'nullable|string|max:255',
        ],[
            'nama_pelapor.required' => 'Nama Pelapor wajib diisi.',
            'no_hp_pelapor.numeric' => 'Nomor HP Pelapor harus berupa angka.',
            'no_hp_pelapor.digits_between' => 'Nomor HP Pelapor harus terdiri dari 10 hingga 15 digit.',
            'jenis_pelanggaran.required' => 'Pilih setidaknya satu jenis pelanggaran.',
            'kronologi.required' => 'Kronologi wajib diisi.',
            'waktu_pelanggaran.required' => 'Waktu pelanggaran wajib diisi.',
            'tempat_pelanggaran.required' => 'Tempat pelanggaran wajib diisi.',
            'konsekuensi.max' => 'Konsekuensi tidak boleh lebih dari 500 karakter.',
            'terlapor.min' => 'Minimal satu terlapor harus diisi.',
            'terlapor.*.nama.required' => 'Nama terlapor wajib diisi.',
            'terlapor.*.jabatan.required' => 'Jabatan terlapor wajib diisi.',
            'terlapor.*.unit.required' => 'Unit terlapor wajib diisi.',
            'bukti.*.file.mimes' => 'File yang diperbolehkan hanya : jpg, jpeg, png, pdf, doc, docx',
        ]);

        // Generate tiket baru
        $noTiket = $this->generateTicketCode();

        // Create the Pengaduan entry
        $pengaduan = Pengaduan::create([
            'tiket' => $noTiket,
            'user_id' => Auth::user()->id,
            'nama_pelapor' => $validated['nama_pelapor'],
            'alamat_pelapor' => $validated['alamat_pelapor'],
            'no_hp_pelapor' => $validated['no_hp_pelapor'],
            'email_pelapor' => Auth::user()->email,
            'jenis_pelanggaran' => json_encode($validated['jenis_pelanggaran']),
            'kronologi' => $validated['kronologi'],
            'waktu_pelanggaran' => $validated['waktu_pelanggaran'],
            'tempat_pelanggaran' => $validated['tempat_pelanggaran'],
            'konsekuensi' => $validated['konsekuensi'] ?? null,
            'status' => 1,
        ]);

        // Menambahkan Terlapor jika ada
        $terlapor = $request->terlapor ?? null;
        $pihakTerlibat = $request->terlibat ?? null;
        $saksiSaksi = $request->saksi ?? null;

        // Menambahkan data Terlapor
        if ($terlapor) {
            foreach ($terlapor as $row) {
                Terlapor::create([
                    'pengaduan_id' => $pengaduan->id,
                    'nama' => $row['nama'],
                    'jabatan' => $row['jabatan'],
                    'unit' => $row['unit'],
                ]);
            }
        }

        // Menambahkan Pihak Terlibat jika ada
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

        // Menambahkan Saksi-saksi jika ada
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

        // Menambahkan bukti jika ada
        if ($request->file('bukti')) {
            foreach ($validated['bukti'] as $file) {
                $nama = $file['nama_file'];
                $tipe = $file['file']->getClientOriginalExtension();
                $namaFile = $nama . '.' . $tipe;
                $bukti = $file['file']->storeAs('bukti/' . $noTiket, $namaFile, 'public');
                $ukuran = $file['file']->getSize();

                FileBukti::create([
                    'pengaduan_id' => $pengaduan->id,
                    'nama' => $nama,
                    'tipe' => $tipe,
                    'ukuran' => $this->formatSize($ukuran),
                    'path' => $bukti
                ]);
            }
        }

        // Log activity
        activity()
            ->performedOn($pengaduan)
            ->withProperties(['status' => $pengaduan->statusPengaduan->nama])
            ->log('Pengaduan telah dibuat dengan nomer tiket #' . $pengaduan->tiket);

        // Kirim email ke pengguna
        Mail::to($request->user()->email)->send(new MailPengaduan($pengaduan));

        // Notifikasi
        Alert::success('Success Title', 'Success Message');

        return redirect('pengaduan')->with('toast_success', 'Pengaduan Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laporan = Pengaduan::find(Crypt::decrypt($id));
        $jenisPelanggaran = JenisPelanggaran::get();
        $activities = Activity::where('subject_type', Pengaduan::class)
                      ->where('subject_id', $laporan->id)
                      ->get();
        $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        // dd($activities->where('description', 'like', '%Keren%'));
        return view('apps.admin.pengaduan.show', compact('laporan', 'activities', 'jenisPelanggaran'));
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
        if($request->kronologi){
            activity('kronologi')
            ->performedOn($pengaduan)
            ->withProperties(['kronologi' => $request->kronologi])
            ->log('Menambahkan Kronologi');
            return back()->with('toast_success', 'Kronologi Berhasil Ditambah');
        }elseif ($request->status){
            $pengaduan->update([
                'status' => $request->status,
            ]);
            if($pengaduan->statusPengaduan->nama === 'Selesai'){
                $pengaduan->update([
                    'finish_date' => Carbon::now(),
                ]);
            }
            activity()
            ->performedOn($pengaduan)
            ->withProperties(['status' => $pengaduan->statusPengaduan->nama])
            ->log($request->keterangan);

            Mail::to($pengaduan->user->email)->send(new Status($pengaduan, $request->keterangan));

            return back()->with('toast_success', 'Status Berhasil Diperbarui');
        }elseif ($request->jenis_pelanggaran){

            // Ambil nilai lama dari jenis_pelanggaran yang ada
            $oldJenisPelanggaran = json_decode($pengaduan->jenis_pelanggaran, true);

            // Ambil data jenis_pelanggaran yang dipilih dari form
            $newJenisPelanggaran = $request->input('jenis_pelanggaran', []);

            // Cari tahu elemen yang baru ditambahkan (yang ada di newJenisPelanggaran tapi tidak ada di oldJenisPelanggaran)
            $newlyAdded = array_diff($newJenisPelanggaran, $oldJenisPelanggaran);
            $removed = array_diff($oldJenisPelanggaran, $newJenisPelanggaran);
            $pengaduan->update([
                'jenis_pelanggaran' => json_encode($newJenisPelanggaran)
            ]);
            if (!empty($newlyAdded)) {
                activity('jenis_pelanggaran')
                    ->performedOn($pengaduan)
                    ->withProperties(['jenis_pelanggaran' => $newlyAdded])
                    ->log('Jenis Pelanggaran Baru Ditambahkan: ' . implode(', ', $newlyAdded));
            }

            // Catat log perubahan untuk elemen yang dihapus
            if (!empty($removed)) {
                activity('jenis_pelanggaran')
                    ->performedOn($pengaduan)
                    ->withProperties(['jenis_pelanggaran' => $removed])
                    ->log('Jenis Pelanggaran Dihapus: ' . implode(', ', $removed));
            }
            // activity()
            // ->performedOn($pengaduan)
            // ->log('Jenis Pelanggaran Diperbarui :'. json_encode($pengaduan->jenis_pelanggaran));
            return back()->with('toast_success', 'Jenis Pelanggaran Berhasil Ditambah');
        }else{
            activity('konsekuensi')
            ->performedOn($pengaduan)
            ->withProperties(['konsekuensi' => $request->konsekuensi])
            ->log('Menambahkan Konsekuensi');
            return back()->with('toast_success', 'Konsekuensi Berhasil Ditambah');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        dd(request());
        if(request()->trash === true){
        }else{
            $pengaduan->delete();
        }

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

    public function print($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('apps.admin.pengaduan.print', compact('pengaduan'));
    }
}
