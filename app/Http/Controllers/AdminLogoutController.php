<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // Logout the admin user
        Auth::guard('admin')->logout();

        // Invalidate the current session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the admin login page
        return redirect()->route('admin-login.index');
    }

}
