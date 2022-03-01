<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

use Alert;
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

        $tunjangan = 0;
        if($request->nama_jabatan == 'Direktur'){
            $tunjangan = 5000000;
        }else if($request->nama_jabatan == 'Manager'){
            $tunjangan = 4500000;
        }else if($request->nama_jabatan == 'Sekretaris'){
            $tunjangan = 2000000;
        }else if($request->nama_jabatan == 'Bendahara'){
            $tunjangan = 1000000;
        }else if($request->nama_jabatan == 'OB'){
            $tunjangan = 500000;
        }else if($request->nama_jabatan == 'Direksi'){
            $tunjangan = 10000000;
        }else if($request->nama_jabatan == 'Direkturutama'){
            $tunjangan = 9500000;
        }else if($request->nama_jabatan == 'Managerpemasaran'){
            $tunjangan = 8000000;
        }else if($request->nama_jabatan == 'Adminis'){
            $tunjangan = 9000000;
        }


        $jabatan = new jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->gapok = $request->gapok;
        $jabatan->tunjangan=$tunjangan;
        $jabatan->save();
        Alert::success('Success', 'Berhasil Menambahkan Data Jabatan');

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
            // 'tunjangan' => 'required',

        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->gapok = $request->gapok;
        // $jabatan->tunjangan=$request->tunjangan;
        $jabatan->save();
        Alert::success('Success', 'Berhasil MengUpdate Data Jabatan');

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

        if (!Jabatan::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('jabatan.index');
    }
}
