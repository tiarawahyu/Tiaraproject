<?php

namespace App\Http\Controllers;

use App\Models\Usulan;
use App\Models\Usulanlama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsulanController extends Controller
{
    public function usulan_input(Request $request)
    {
        // $jenis = "__ALL__";
        // if($request->jenis !== null){
        //     $jenis = $request->jenis;
        // }
        // $rumpun = "__ALL__";
        // if($request->rumpun !== null){
        //     $rumpun = $request->rumpun;
        // }
        // $usulan = "__ALL__";
        // if($request->usulan !== null){
        //     $usulan = $request->usulan;
        // }

        // ambil data usulan
        $data["datausulan_lama"] = DB::table("table_usulan_lama as A")
            ->select("*", "USULAN.nama as USULAN_NAMA", "RUMPUN.nama as RUMPUN_NAMA", "JENIS.nama as JENIS_NAMA")
            ->join("table_usulan_ref_usulan as USULAN", "A.usulan", "=", "USULAN.id")
            ->join("table_usulan_ref_rumpun as RUMPUN", "USULAN.rumpun_id", "=", "RUMPUN.id")
            ->join("table_usulan_ref_jenis as JENIS", "RUMPUN.jenis_id", "=", "JENIS.id")
            ->get();

        $data["ref_jenis"] = DB::table("table_usulan_ref_jenis")->get();

        $dbRumpun  = DB::table("table_usulan_ref_rumpun");
        //$dbRumpun = $jenis == "__ALL__" ? $dbRumpun : $dbRumpun->where("id", $jenis);
        $data["ref_rumpun"] = $dbRumpun->get();

        $dbUsulan = DB::table("table_usulan_ref_usulan");
        //$dbUsulan = $jenis == "__ALL__" ? $dbUsulan : $dbUsulan->where("id", $usulan);
        $data["ref_usulan"] = $dbUsulan->get();

        // $data["selectedJenis"] = ($jenis == "__ALL__") ? $data["ref_jenis"][0]->id : $jenis;
        // $data["selectedRumpun"] = ($rumpun == "__ALL__") ? $data["ref_rumpun"][0]->id : $rumpun;

        //$data = Pegawai::orderBy('no', 'asc')->paginate(2);
        return view('v_usulan_input')->with('data', $data);
    }

    public function process_input_usulan(Request $request)
    {
        // validasi isian form
        $request->validate([
            'jenis' => 'required',
            'rumpun' => 'required',
            'usulan' => 'required'
        ]);

        // check exist
        $cek = Usulanlama::where("usulan", $request->usulan)->get();
        if(count($cek) > 0){
            return redirect('usulan_input')->with('pesan_error','Usulan sudah pernah ditambahkan');
        }

        // check data
        $cekUsulan = DB::table("table_usulan_ref_usulan as USULAN")
            ->select("*", "USULAN.id as USULAN_ID",  "RUMPUN.id as RUMPUN_ID",  "JENIS.id as JENIS_ID")
            ->join("table_usulan_ref_rumpun as RUMPUN", "USULAN.rumpun_id", "=", "RUMPUN.id")
            ->join("table_usulan_ref_jenis as JENIS", "RUMPUN.jenis_id", "=", "JENIS.id")
            ->where("USULAN.id", $request->usulan)
            ->first();
            if($request->rumpun != $cekUsulan->RUMPUN_ID){
                return redirect('usulan_input')->with('pesan_error','Usulan dengan Rumpun dipilih tidak valid');
            }
            if($request->jenis != $cekUsulan->JENIS_ID){
                return redirect('usulan_input')->with('pesan_error','Usulan dengan Jenis dipilih tidak valid');
            }

        //$cekUsulan = DB::table("table_usulan_ref_usulan")->where("id", $request->usulan)->first();
        // if($cekUsulan->rumpun_id != $request->rumpun){
        //     //
        // }
        // $cekRumpun = DB::table("table_usulan_ref_rumpun")->where("id", $cekUsulan->rumpun_id)->first();
        // if($cekRumpun->rumpun_id != $request->rumpun){
        //     //
        // }

        // save ke db
        $usulan = new Usulanlama();
        $usulan->usulan = $request->usulan;
        $usulan->save();
        return redirect('usulan_input')->with('pesan_status','Usulan berhasil ditambah');
    }

    public function usulan()
    {
        // ambil data usulan
        $data["datausulan_lama"] = Usulanlama::get();
        $data["datausulan"] = Usulan::all();
        //$data = Pegawai::orderBy('no', 'asc')->paginate(2);
        return view('v_usulan_input')->with('data', $data);
    }

    public function process_add_usulan(Request $request)
    {
        // validasi isian form
        $request->validate([
            'usulan' => 'required'
        ]);
        // save ke db
        $usulan = new Usulan();
            $usulan->usulan = $request->usulan;
        $usulan->save();
        return redirect('usulan_input')->with('pesan_status','Usulan berhasil ditambah');
    }

    public function delete_usulan(Request $request)
    {
        // tidak bisa menghapus dirinya sendiri
        $idusulan = session()->get('idusulan');
        // cek id nya ada di SDB apa tidak
        if ( DB::table('table_usulan_lama')->where('id','=',$request->id)->doesntExist() )
        {
            return redirect('usulan_input')->with('pesan_error','Usulan tidak ditemukan');
        }
        // hapus kalau datanya ada
        DB::table('table_usulan_lama')
            ->where('id','=',$request->id)
            ->delete();
        return redirect('usulan_input')->with('pesan_status','Data Usulan berhasil di Hapus');
    }
}
