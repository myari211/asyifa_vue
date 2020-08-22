<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Akun;
use Ramsey\Uuid\Uuid;

class AkunController extends Controller
{
    public function index(){
       return Akun::all();
    }

    public function add(Request $request){
        $akun = new Akun;
        $akun->id = Uuid::uuid4()->getHex();
        $akun->kode_akun = $request->kode_akun;
        $akun->jenis_akun = $request->jenis_akun;
        $akun->bagian_akun = $request->bagian_akun;
        $akun->nama_akun = $request->nama_akun;
        $akun->save();
    }

    public function edit($id, Request $request){
        $akun = Akun::find($id);
        $akun->update($request->all());

        return $akun;
    }

    public function delete($id){
        $akun = Akun::find($id);
        $akun->delete();

        return 204;
    }

    public function show($id){
        $akun = Akun::find($id);
        return $akun;
    }

}
