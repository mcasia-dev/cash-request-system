<?php
namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForceLogoutAfterRegistration
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status !== 'approved') {
            Auth::logout();

            return redirect()
                ->to(Filament::getLoginUrl())
                ->withErrors([
                    'email' => 'Account not activated yet. Please wait for admin approval.',
                ]);
        }

        return $next($request);
    }
}
