<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('v_form_login');
    }

    public function formlogin()
    {
        return view('v_form_login');
    }

    public function dashboard()
    {
        $usersChart = new UserChart;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('v_dashboard', [ 'usersChart' => $usersChart ] );
    }

    public function loginprocess(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials))
        {
            $request -> session() -> regenerate();
            $request -> session() -> put('username', auth()->user()->username);
            $request -> session() -> put('iduser', auth()->user()->id);
            $request -> session() -> put('nama', auth()->user()->nama);
            return redirect('dashboard') -> with('pesan_info', auth()->user()->nama);
        }
        return back() -> with('pesan_error', 'Username dan Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();
        return redirect('login') -> with('pesan_status', 'Anda Telah Logout');
    }
}