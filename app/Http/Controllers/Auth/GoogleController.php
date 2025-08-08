<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')
                ->scopes(['email', 'profile'])
                ->redirect();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'google' => 'Không thể kết nối với Google. Vui lòng thử lại.'
            ]);
        }
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            if ($request->has('error')) {
                return redirect()->route('login')->withErrors([
                    'google' => 'Người dùng đã hủy đăng nhập hoặc có lỗi từ Google.'
                ]);
            }

            if (!$request->has('code')) {
                return redirect()->route('login')->withErrors([
                    'google' => 'Không nhận được mã xác thực từ Google.'
                ]);
            }

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('email', $googleUser->getEmail())
                ->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'username' => $this->generateUsername($googleUser->getEmail()),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(Str::random(32)),
                    'role' => 'user',
                    'email_verified_at' => now(),
                ]);
            } else {
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                        'email_verified_at' => $user->email_verified_at ?? now()
                    ]);
                }
            }

            Auth::login($user, true);

        
        $redirectRoute = $user->role === 'admin' ? 'admin.dashboard' : 'products.index';
            return redirect()->route($redirectRoute)->with('success', 'Đăng nhập thành công với Google!');
            
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return redirect()->route('login')->withErrors([
                'google' => 'Phiên đăng nhập không hợp lệ. Vui lòng thử lại.'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'google' => 'Đã xảy ra lỗi khi đăng nhập với Google. Vui lòng thử lại.'
            ]);
        }
    }

    private function generateUsername($email)
    {
        $baseUsername = explode('@', $email)[0];
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }
}


