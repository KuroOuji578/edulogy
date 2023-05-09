<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Jurusan;
use App\Models\Register;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $register;
    // membuat instance dari model kategori
    public function __construct()
    {
        $this->register = new register;
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
        $agama = Agama::all();
        $jurusan = Jurusan::all();
        return view('landing.create', compact('agama', 'jurusan'));
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
            'nama' => 'required|min:3|max:50|unique:register,nama',
            'jk' => 'required|min:1|max:10|',
            'alamat' => 'required',
            'agama_id' => 'required',
            'asal_sekolah' => 'required',
            'jurusan_id' => 'required',
        ];

        $messages = [
            'unique' => ":attribute sudah tersedia, silakan input lain",
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
        ];

        $this->validate($request, $rules, $messages);

        //tangkap request user
        $this->register->nama = $request->nama;
        $this->register->jk = $request->jk;
        $this->register->alamat = $request->alamat;
        $this->register->agama_id = $request->agama_id;
        $this->register->asal_sekolah = $request->asal_sekolah;
        $this->register->jurusan_id = $request->jurusan_id;
        //simpan file gambar ke direktori upload yang ada didalam public
        // simpan data menggunakan method save()
        $this->register->save();

        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('dash')->with('success', 'Task Created Successfully!');
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
