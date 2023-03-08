<?php

namespace App\Http\Controllers;

use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengembanganController extends Controller
{
    public function diklat_kepeminpinan()
    {
        return view('v_diklat_kepemimpinan');
    }
    public function diklat_fungsional()
    {
        return view('v_diklat_fungsional');
    }
    public function diklat_teknis()
    {
        return view('v_diklat_teknis');
    }
    public function bimtek()
    {
        return view('v_bimtek');
    }
}
