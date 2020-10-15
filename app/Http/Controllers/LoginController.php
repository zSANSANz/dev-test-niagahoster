<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function cek(Request $req)
    {
        $this->validate($req, [
            'username'=>'required',
            'password'=>'required'
        ]);
        $proses = Kontak::where('username',$req->username)->where('password',$req->password)->first();
        if($proses!="") {
            Session::put('id_kontak',$proses->id_kontak);
            Session::put('username',$proses->username);
            Session::put('password',$proses->password);
            Session::put('nama',$proses->nama);
            Session::put('login_status',true);
            return redirect('/Paket');
        } else {
            Session::flash('alert_pesan','Username dan password tidak cocok');
            return redirect('Login');
        }

    }

    public function logout()
    {
        Session::flush();
        return redirect('Login');

    }

    public function create() 
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);

        $data = new Kontak();
        $data->username = $request->username;
        $data->password = $request->password;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect()->route('Kontak.index')->with('alert_message', 'Berhasil menambah data!');
    
    }

}
