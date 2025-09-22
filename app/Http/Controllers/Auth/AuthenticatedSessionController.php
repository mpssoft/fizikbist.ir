<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    use TwoFactorAuthenticate;
    /**
     * Display the login view.
     */
    protected $redirectTo = "/";
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $request->session()->regenerate();
        if ($this->loggedIn($request, $request->user())) {
            return $this->loggedIn($request, $request->user()) ?? redirect()->intended(
                $request->user()->role === 'admin' ? '/admin' : '/user'
            );
        }

// Redirect to intended URL or fallback based on role
        return redirect()->intended(
            $request->user()->role === 'admin' ? '/admin' : '/user'
        );


    }
    public function username()
    {
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        request()->merge([$field => $login]);
        return $field;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
