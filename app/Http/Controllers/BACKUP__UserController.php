<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function manageuser()
    {
        $data = DB::table('table_users')->paginate(10);
        return view('v_manage_user', ['datauser' => $data]);
    }

    public function form_add_user()
    {
        return view('v_form_add_user');
    }

    public function process_add_user(Request $request)
    {
        //validasi isian form
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        // cek password & confirm password sama atau tidak
        if($request->password != $request->confirm_password)
        {
            return redirect('form_add_user')->with('pesan_error','Password Tidak Cocok')->withInput();
        }
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
        //insert to DB
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password)
        ]);
        return redirect('manageuser')->with('pesan_status','User berhasil ditambah');
    }

    public function form_edit_user($id)
    {
        //cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$id)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        //kalau datanya ada
        $user = DB::table('table_users')
            ->where('id','=',$id)
            ->get();
        return view('v_form_edit_user', ['datauser'=>$user]);
    }

    public function process_edit_user(Request $request)
    {
        //validasi isian form
        $request->validate([
            'iduser' => 'required',
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        //cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$request->iduser)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        // cek password & confirm password sama atau tidak
        if($request->password != $request->confirm_password)
        {
            // return redirect('form_adduser')->with('pesan_error','Password Tidak Cocok')->withInput();
            return back()->with('pesan_error','Password Tidak Cocok');
        }
        //cek username dan email baru apakah sudah ada didatabase atau belum
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
        //update data
        DB::table('table_users')
            ->where('id','=',$request->iduser)
            ->update([
                'username'=> $request->username,
                'nama'=> $request->nama,
                'email'=> $request->email,
                'level'=> $request->level,
                'password'=> Hash::make($request->password)
            ]);
        return redirect('manageuser')->with('pesan_status','Data berhasil di Update');
    }

    public function delete_user($id)
    {
        //tidak bisa menghapus dirinya sendiri
        $iduser = session()->get('iduser');
        if ($iduser == $id)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa menghapus diri sendiri');
        }
        //tidak bisa menghapus akun iruhnamad :)
        if ($id == 1)
        {
            return redirect('manageuser')->with('pesan_error','Tidak bisa menghapus Admin tersebut');
        }
        //cek id nya ada di SDB apa tidak
        if ( DB::table('table_users')->where('id','=',$id)->doesntExist() )
        {
            return redirect('manageuser')->with('pesan_error','User tidak ditemukan');
        }
        //kalau datanya ada
        DB::table('table_users')
            ->where('id','=',$id)
            ->delete();
        return redirect('manageuser')->with('pesan_status','Data User berhasil di Hapus');
    }
}
