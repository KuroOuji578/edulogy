<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $agama;
    // membuat instance dari model kategori
    public function __construct()
    {
        $this->agama = new agama;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_agama' => 'required|min:3|max:20|unique:agama,agama',
        ];

        $messages = [
            'unique' => ":attribute sudah tersedia, silakan input lain",
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
        ];

        $this->validate($request, $rules, $messages);

        //tangkap request user
        $this->agama->agama = $request->nama_agama;
        //simpan file gambar ke direktori upload yang ada didalam public
        // simpan data menggunakan method save()
        $this->agama->save();

        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('meta')->with('status', 'Data Agama berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Agama::findOrFail($id);
        return view('agama.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Agama::findOrFail($id);

        // if ($update->gambar == null) {
        //     echo "gambar kosong";
        // }
        //dd($update);
        $update->agama = $request->nama_agama;
        // 12345678.jpg
        $update->save();
        return redirect()->route('meta')->with('status', 'Data Agama berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Agama::findOrFail($id);
        $destroy->delete();
        return redirect()->route('meta')->with('status', 'Data agama berhasil dihapus');
    }
}
