<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth()->user()->hasRole('SUPER_ADMIN')) {
            return view('admin.index');
        }

        return view('my-account');
    }

    /**
     * Logout the current user and redirect to login page
     */
    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }
}
