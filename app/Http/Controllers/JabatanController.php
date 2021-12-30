<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Session;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('admin.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.create');
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
            'nama_jabatan' => 'required',
            'gapok' => 'required',
        ]);

        $jabatan = new jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->gapok = $request->gapok;
        $jabatan->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan  $jabatan->nama_jabatan"
        ]);
        return redirect()->route('jabatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('admin.jabatan.show', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'gapok' => 'required',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->gapok = $request->gapok;
        $jabatan->save();
        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect()->route('jabatan.index');
    }
}
