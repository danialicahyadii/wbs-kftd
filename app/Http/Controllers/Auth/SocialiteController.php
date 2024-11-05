<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $authUser = $this->findOrCreateUser($user);

        Auth()->login($authUser, true);

        return redirect('pengaduan');
    }

    public function findOrCreateUser($socialUser)
    {
        $socialAccount = User::where('email', $socialUser->getEmail())
        ->first();

        if ($socialAccount) {
            $client = new Client();
            $response = $client->get($socialUser->getAvatar());
            $imageName = $socialUser->getName() . '.jpg';
            Storage::disk('public')->put('avatars/' . $imageName, $response->getBody());

            $socialAccount->update([
                'avatar' => 'avatars/'. $imageName,
            ]);
            return $socialAccount;

        } else {
            $user = User::where('email', $socialUser->getEmail())->first();
            $client = new Client();
            $response = $client->get($socialUser->getAvatar());
            $imageName = $socialUser->getName() . '.jpg';
            Storage::disk('public')->put('avatars/' . $imageName, $response->getBody());
            if (!$user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'email_verified_at' => now(),
                    'password' => bcrypt('admin123'),
                    'avatar' => 'avatars/'.$imageName,
                ]);

                $user->assignRole('User');
            }

            // return user
            return $user;
        }
    }
}
