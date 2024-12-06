<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\Komentar;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class KomentarController extends Controller
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
        $komen = Komentar::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id' => Auth::user()->id,
                'parent_id' => $request->parent_id ?? null,
                'komentar' => $request->komentar
            ]);
        if($request->user()->id === $pengaduan->user_id){
            $email = User::role('Admin')->first();
        }else{
            $email = $pengaduan->user->email;
        }
            event(new MyEvent($komen->komentar));
            activity()
            ->performedOn($pengaduan)
            ->log('Menambahkan Komentar "'.$komen->komentar.'"');
            Mail::to($email)->send(new \App\Mail\Komentar($pengaduan, $komen));
            return back()->with('toast_success', 'Komentar Ditambahkan!');
    }

   /**
     * Mendapatkan notifikasi yang belum dibaca
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadUnseenNotifications(Request $request)
    {
        // $komentar = Komentar::with(['user', 'pengaduan'])->get();
        $comments = Komentar::unseen()
                            ->with(['pengaduan', 'user'])  // Memuat relasi pengaduan
                            ->orderBy('id', 'desc')->get();
        $output = '';
        if ($comments->isEmpty()) {
            $output .= '<li><a href="#" class="text-bold text-italic">No Notifications Found</a></li>';
        } else {
            foreach ($comments as $comment) {
                $output .= '
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img src="' . ($comment->user->avatar ? Storage::url($comment->user->avatar) : asset('interactive/assets/images/avatar.png')) . '" class="avatar-xs rounded-circle" alt="" />
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fs-14">
                            ' . ($comment->user_id == $comment->pengaduan->user_id ? $comment->pengaduan->user->name : $comment->user->name) . '
                            <small class="text-muted ms-2">' . $comment->created_at->format('d M Y - H:i') . '</small>
                        </h5>
                        <p class="text-muted">' . $comment->komentar . '</p>
                    </div>
                </div>';
            }
        }
        if(Auth::user()->roles->first()->name == 'Admin'){
            $unseenCount = Komentar::unseen()->count();
        }else{
            $unseenCount = Komentar::unseen()->where('user_id', '1')->count();
        }
        return response()->json([
            'notifications' => $output,
            'unseen_notification' => $unseenCount
        ]);
    }

    /**
     * Tandai semua notifikasi sebagai telah dibaca
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsSeen()
    {
        Komentar::where('is_seen', false)->update(['is_seen' => true]);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komentar $komentar)
    {
        //
    }
}
