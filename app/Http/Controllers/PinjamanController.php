<?php

namespace App\Http\Controllers;

use Alert;
use Session;
use App\Models\Karyawan;
use App\Models\Pinjaman;
 use App\Models\Gaji;

use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::with('karyawan')->get();
        return view('admin.pinjaman.index', compact('pinjaman'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data author
        $karyawan = Karyawan::all();
        return view('admin.pinjaman.create', compact('karyawan'));

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
            'karyawan_id' => 'required|numeric',
            'bpjs' => 'required|numeric',
            'investasi' => 'required|numeric',
            // 'lembur' => 'required',
            'kasbon' => 'required|numeric',
            'tagihan' => 'required|numeric',
            //'total'=>'required',
        ]);

        $pinjaman = new Pinjaman;
        $pinjaman->karyawan_id = $request->karyawan_id;
        $pinjaman->bpjs = $request->bpjs;
        $pinjaman->investasi = $request->investasi;
        $pinjaman->kasbon = $request->kasbon;
        // $pinjaman->lembur = $request->lembur;
        $pinjaman->tagihan = $request->tagihan;
        $pinjaman->total_pinjaman = $pinjaman->bpjs + $pinjaman->investasi + $pinjaman->kasbon - $pinjaman->tagihan;

        $pinjaman->save();
        Alert::success('Success', 'Berhasil Menambahkan Data Pinjaman');
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan  $pinjaman->karyawan_id  ",
        ]);
        return redirect()->route('pinjaman.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pinjaman)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        return view('admin.pinjaman.show', compact('pinjaman'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjaman $pinjaman)
    {

        // $gaji = Gaji::findOrFail($id);
        $karyawan = Karyawan::all();
        return view('admin.pinjaman.edit', compact('pinjaman', 'karyawan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        $request->validate([
            'karyawan_id' => 'required|numeric',
            'bpjs' => 'required|numeric',
            'investasi' => 'required|numeric',
            // 'lembur' => 'required',
            'kasbon' => 'required|numeric',
            'tagihan' => 'required|numeric',
            //'total'=>'required',
        ]);

        $pinjaman = new Pinjaman;
        $pinjaman->karyawan_id = $request->karyawan_id;
        $pinjaman->bpjs = $request->bpjs;
        $pinjaman->investasi = $request->investasi;
        $pinjaman->kasbon = $request->kasbon;
        // $pinjaman->lembur = $request->lembur;
        $pinjaman->tagihan = $request->tagihan;
        $pinjaman->total_pinjaman = $pinjaman->bpjs + $pinjaman->investasi + $pinjaman->kasbon - $pinjaman->tagihan;

        $pinjaman->save();
        Alert::success('Success', 'Berhasil Menambahkan Data Pinjaman');

        return redirect()->route('pinjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Pinjaman::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data berhasil di hapus');
        return redirect()->route('pinjaman.index');

    }
}
