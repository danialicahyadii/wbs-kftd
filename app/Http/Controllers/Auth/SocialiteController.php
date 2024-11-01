<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth()->login($authUser, true);

        return redirect('pengaduan');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        $socialAccount = User::where('email', $socialUser->getEmail())
        ->first();

        // Jika sudah ada
        if ($socialAccount) {
            // return user
            return $socialAccount;

            // Jika belum ada
        } else {

            // User berdasarkan email
            $user = User::where('email', $socialUser->getEmail())->first();

            // Jika Tidak ada user
            if (!$user) {
                // Create user baru
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'email_verified_at' => now(),
                    'password' => bcrypt('admin123')
                ]);
            }

            // Buat Social Account baru
            $user->update([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
            ]);

            // return user
            return $user;
        }
    }
}
