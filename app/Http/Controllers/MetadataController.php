<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Jurusan;
use App\Models\Register;
use Illuminate\Http\Request;

class MetadataController extends Controller
{
    public function index()
    {
        $agama = Agama::all();
        $jurusan = Jurusan::all();
        $register = Register::all();

        return view('metadata.index', compact('agama', 'jurusan', 'register'));
    }

    public function edit($id)
    {
        $edit = Register::findOrFail($id);
        $agama = Agama::all();
        $jurusan = Jurusan::all();
        return view('metadata.edit', compact('edit', 'agama', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $update = Register::findOrFail($id);

        // if ($update->gambar == null) {
        //     echo "gambar kosong";
        // }
        //dd($update);
        $update->nama = $request->nama;
        $update->jk = $request->jk;
        $update->alamat = $request->alamat;
        $update->agama_id = $request->agama_id;
        $update->asal_sekolah = $request->asal_sekolah;
        $update->jurusan_id = $request->jurusan_id;
        // 12345678.jpg
        $update->save();
        return redirect()->route('meta')->with('status', 'Data register berhasil di update');
    }

    public function destroy($id)
    {
        $destroy = Register::findOrFail($id);
        $destroy->delete();
        return redirect()->route('meta')->with('status', 'Data Register berhasil dihapus');
    }
}
