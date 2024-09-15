<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowSuccessController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (! $request->session()->has('success') && ! $request->session()->has('error')) {
            abort(404);
        }
        return view('payment_success');
    }
}
