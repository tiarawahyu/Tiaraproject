<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kompetensi;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function manageuser()
    {
        // ambil data user
        $data = DB::table('table_users as A')
            ->leftJoin('table_leveluser as B','A.level','=','B.id')
            ->select('A.id as id','A.username as username','A.nama as nama','A.nip as nip','A.jabatan as jabatan','A.unit_kerja as unit_kerja','A.pendidikan as pendidikan','A.gender as gender', 'A.email as email','B.level as level')
            ->get();
        return view('v_manage_user', ['datauser' => $data]);
    }

    public function form_add_user()
    {
        // nampilin form utk input user
        $leveluser = UserLevel::all();
        return view('v_form_add_user',['leveluser' => $leveluser]);
    }

    public function process_add_user(Request $request)
    {
        // validasi isian form
        $request->validate([
            'username' => 'required|min:6',
            'nama' => 'required|min:1',
            'nip' => 'required|min:1',
            'jabatan' => 'required',
            'unit_kerja' => 'required',
            'pendidikan' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'level' => 'required',
            // 'password' => 'required|min:6|confirmed'
        ]);
        // cek di DB sudah ada apa belum
        if(
                DB::table('table_users')
                    ->where('username','=',$request->username)
                    ->orWhere('email','=',$request->email)
                    ->exists()
        )
        {
            return redirect('form_add_user')->with('pesan_error','Username/Email sudah ada di database, silakan gunakan Username/Email yang lain')->withInput();
        }
        // save ke db
        $pass = "Dinsosoke!";
        $user = new User();
            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->nip = $request->nip;
            $user->jabatan = $request->jabatan;
            $user->unit_kerja = $request->unit_kerja;
            $user->pendidikan = $request->pendidikan;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->level = $request->level;
            $user->password = Hash::make($pass);
        $user->save();
        return redirect('manageuser')->with('pesan_status','User berhasil ditambah');
    }

    public function form_edit_user(Request $request)
    {
        // tidak bisa mengedit akun iruhnamad :)
        if ($request->id == 1)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa mengedit Admin tersebut');
        }
        // cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$request->id)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        // kalau datanya ada
        $leveluser = UserLevel::all();
        $user = DB::table('table_users')
            ->where('id','=',$request->id)
            ->get();
        return view('v_form_edit_user', ['datauser' => $user, 'leveluser' => $leveluser]);
    }

    public function process_edit_user(Request $request)
    {
        // validasi isian form
        $request->validate([
            'iduser' => 'required',
            'username' => 'required',
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'unit_kerja' => 'required',
            'pendidikan' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'level' => 'required',
        ]);
        // tidak bisa mengedit akun iruhnamad :)
        if ($request->iduser == 1)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa mengedit Admin tersebut');
        }
        // cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$request->iduser)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        // cek username dan email baru apakah sudah ada didatabase atau belum
        if(
            DB::table('table_users')
                ->where('id','<>',$request->iduser)
                ->where(function($query) use ($request)
                    {
                        $query  ->where('username','=',$request->username)
                                ->orWhere('email','=',$request->email);
                    })
                ->exists()
        )
        {
            return back()->with('pesan_error','Username/Email sudah ada di database dan tidak boleh sama');
        }
        // update data
        DB::table('table_users')
            ->where('id','=',$request->iduser)
            ->update([
                'username'=> $request->username,
                'nama'=> $request->nama,
                'nip'=> $request->nip,
                'jabatan'=> $request->jabatan,
                'unit_kerja'=> $request->unit_kerja,
                'pendidikan'=> $request->pendidikan,
                'email'=> $request->email,
                'gender'=> $request->gender,
                'level'=> $request->level
            ]);
        return redirect('manageuser')->with('pesan_status','Data berhasil di Update');
    }

    public function delete_user(Request $request)
    {
        // tidak bisa menghapus dirinya sendiri
        $iduser = session()->get('iduser');
        if ($iduser == $request->id)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa menghapus diri sendiri');
        }
        // tidak bisa menghapus akun iruhnamad :)
        if ($request->id == 1)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa menghapus Admin tersebut');
        }
        // cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$request->id)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        // hapus kalau datanya ada
        DB::table('table_users')
            ->where('id','=',$request->id)
            ->delete();
        return redirect('manageuser')->with('pesan_status','Data User berhasil di Hapus');
    }

    public function profile()
    {
        $iduser = session()->get('iduser');
        $user = User::whereId($iduser)->first();
        return view('v_profile', ['datauser' => $user]);
    }

    public function form_ubah_password()
    {
        return view('v_form_ubah_password');
    }

    public function process_ubah_password(Request $request)
    {
        // password user saat ini
        $userpassword = Auth::user()->password;

        // validasi isian form
        $request->validate([
            'iduser' => 'required',
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        // cek jika password saat ini salah
        if ( !Hash::check($request->current_password,$userpassword) )
        {
            return redirect('form_ubah_password')->with('pesan_error','Password yang anda masukkan salah');
        }
        // update password
        DB::table('table_users')
        ->where('id','=',$request->iduser)
        ->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('form_ubah_password')->with('pesan_status','Password Telah Diubah');
    }

    public function detail_pegawai(Request $request)
    {
        if ($request->id == 1)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa mengedit Admin tersebut');
        }
        // cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$request->id)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        // kalau datanya ada
        $leveluser = UserLevel::all();
        $user = DB::table('table_users')
            ->where('id','=',$request->id)
            ->get();
        return view('v_detail_user', ['datauser' => $user, 'leveluser' => $leveluser]);

        // validasi isian form
        $request->validate([
            'iduser' => 'required',
            'username' => 'required',
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'unit_kerja' => 'required',
            'pendidikan' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'level' => 'required',
        ]);
        // tidak bisa mengedit akun iruhnamad :)
        if ($request->iduser == 1)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa mengedit Admin tersebut');
        }
        // cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$request->iduser)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
    }

    public function add_kompetensi()
    {
        $data = Kompetensi::all();
        //$data = Pegawai::orderBy('no', 'asc')->paginate(2);
        return view('v_add_kompetensi')->with('data', $data);
    }

    public function proses_add_kompetensi(Request $request)
    {
        // validasi isian form
        $request->validate([
            'nip' => 'required',
            'nama_pelatihan' => 'required',
            'jenis_pelatihan' => 'required',
            'waktu' => 'required',
            'penyelenggara' => 'required',
            'jumlah_jam' => 'required',
            'no_sertifikat' => 'required',
        ]);
        if(
            DB::table('table_kompetensi')
                ->where('nip','=',$request->nip)
                ->orWhere('no_sertifikat','=',$request->no_sertifikat)
                ->exists()
    )
    {
        return redirect('add_kompetensi')->with('pesan_error','Username/Email sudah ada di database, silakan gunakan Username/Email yang lain')->withInput();
    }
        // save ke db
        $kompetensi = new Kompetensi();
            $nip->nip = $request->nip;
            $nama_pelatihan->nama_pelatihan = $request->nama_pelatihan;
            $jenis_pelatihan->jenis_pelatihan = $request->jenis_pelatihan;
            $waktu->waktu = $request->waktu;
            $penyelenggara->penyelenggara = $request->penyelenggara;
            $jumlah_jam->jumlah_jam = $request->jumlah_jam;
            $no_sertifikat->no_sertifikat = $request->no_sertifikat;
        $kompetensi->save();
        return redirect('detail_pegawai')->with('pesan_status','Usulan berhasil ditambah');
    }
}

