<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $absen = Absen::all();
        return view('admin.absen.index', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.absen.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal_masuk' => 'required',
            'status_absen' => 'required',
        ]);

        $absen = new Absen;
        $absen->karyawan_id = $request->karyawan_id;
        $absen->tanggal_masuk = $request->tanggal_masuk;
        $absen->status_absen = $request->status_absen;
        $absen->save();

        return redirect()->route('absen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $absen = Absen::findOrFail($id);
        return view('admin.absen.show', compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $absen = Absen::findOrFail($id);
        $karyawan = Karyawan::all();
        return view('admin.absen.edit', compact('absen', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal_masuk' => 'required',
            'status_absen' => 'required',
        ]);

        $absen = Absen::findOrFail($id);
        $absen->karyawan_id = $request->karyawan_id;
        $absen->tanggal_masuk = $request->tanggal_masuk;
        $absen->status_absen = $request->status_absen;
        $absen->save();
        return redirect()->route('absen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $absen = Absen::findOrFail($id);
        $absen->delete();
        return redirect()->route('absen.index');
    }
}
