<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data 'jabatan

        // yang berasal dari model 'karyawan'
        $karyawan = Karyawan::with('jabatan')->get();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data 'jabatan'
        $jabatan = Jabatan::all();

        return view('admin.karyawan.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan_id' => 'required',
        ]);

        $karyawan = new Karyawan;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->ttl = $request->ttl;
        $karyawan->jk = $request->jk;
        $karyawan->agama = $request->agama;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->jabatan_id = $request->jabatan_id;
        $karyawan->save();
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawan = Karyawan::findOrFail($id);
        $jabatan = Jabatan::all();
        return view('admin.karyawan.edit', compact('karyawan','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan_id' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->ttl = $request->ttl;
        $karyawan->jk = $request->jk;
        $karyawan->agama = $request->agama;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->jabatan_id = $request->jabatan_id;
        $karyawan->save();
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index');
    }
}
