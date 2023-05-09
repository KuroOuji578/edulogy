<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $jurusan;
    // membuat instance dari model kategori
    public function __construct()
    {
        $this->jurusan = new jurusan;
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
        return view('jurusan.create');
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
            'nama_jurusan' => 'required|min:3|max:20|unique:agama,agama',
        ];

        $messages = [
            'unique' => ":attribute sudah tersedia, silakan input lain",
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
        ];

        $this->validate($request, $rules, $messages);

        //tangkap request user
        $this->jurusan->nama_jurusan = $request->nama_jurusan;
        //simpan file gambar ke direktori upload yang ada didalam public
        // simpan data menggunakan method save()
        $this->jurusan->save();

        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('meta')->with('success', 'Task Created Successfully!');
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
        $edit = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('edit'));
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
        $update = Jurusan::findOrFail($id);

        // if ($update->gambar == null) {
        //     echo "gambar kosong";
        // }
        //dd($update);
        $update->nama_jurusan = $request->nama_jurusan;
        // 12345678.jpg
        $update->save();
        return redirect()->route('meta')->with('status', 'Data jurusan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Jurusan::findOrFail($id);
        $destroy->delete();
        return redirect()->route('meta')->with('status', 'Data jurusan berhasil dihapus');
    }
}
