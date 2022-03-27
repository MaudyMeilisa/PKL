<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Session;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::with('jabatan', 'karyawan')->get();
        return view('admin.gaji.index', compact('gaji'));
    }

    public function cetakForm()
    {
        return view('admin.gaji.cetak');
    }

    public function cetakPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir : " . $tglakhir]);
        $cetak = Gaji::whereDate('tanggal_gajian', '>=', $tglawal)->whereDate('tanggal_gajian', '<=', $tglakhir)->get();
        $total = Gaji::whereDate('tanggal_gajian', '>=', $tglawal)->whereDate('tanggal_gajian', '<=', $tglakhir)->sum('total');
        return view('admin.gaji.cetak-pertanggal', compact('cetak', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengambil data author
        $jabatan = Jabatan::all();
        $karyawan = Karyawan::all();
        return view('admin.gaji.create', compact('jabatan', 'karyawan'));
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
            'jabatan_id' => 'required|numeric',
            'gapok' => 'required|numeric',
            // 'lembur' => 'required',
            'potongan' => 'required|numeric',
            'tanggal_gajian' => 'required',
            //'total'=>'required',
        ]);

        $gaji = new Gaji;
        $gaji->karyawan_id = $request->karyawan_id;
        $gaji->jabatan_id = $request->jabatan_id;
        $gaji->gapok = $request->gapok;
        $gaji->tunjangan = Jabatan::findOrFail($request->jabatan_id)->tunjangan;
        $gaji->potongan = $request->potongan;
        $gaji->total = $gaji->gapok + $gaji->tunjangan + $gaji->lembur - $gaji->potongan;
        $gaji->tanggal_gajian = $request->tanggal_gajian;
        $gaji->save();
        Alert::success('Success', 'Berhasil Menambahkan Data Absensi');
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan  $gaji->karyawan_id  ",
        ]);
        return redirect()->route('gaji.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gaji = Gaji::findOrFail($id);
        return view('admin.gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        $jabatan = Jabatan::all();
        $karyawan = Karyawan::all();
        return view('admin.gaji.edit', compact('gaji', 'karyawan', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'jabatan_id' => 'required',
            'gapok' => 'required',
            'tunjangan' => 'required',
            // 'lembur' => 'required',
            'potongan' => 'required',
            'tanggal_gajian' => 'required',
            //'total'=>'required',
        ]);

        $gaji = Gaji::findOrFail($id);
        $gaji->karyawan_id = $request->karyawan_id;
        $gaji->jabatan_id = $request->jabatan_id;
        $gaji->gapok = $request->gapok;
        $gaji->tunjangan = $request->tunjangan;
        // $gaji->lembur = $request->lembur;
        $gaji->potongan = $request->potongan;
        $gaji->total = $gaji->gapok + $gaji->tunjangan * $gaji->lembur - $gaji->potongan;
        $gaji->tanggal_gajian = $request->tanggal_gajian;

        $gaji->save();
        Alert::success('Success', 'Berhasil MengUpdate Data Gaji');

        return redirect()->route('gaji.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Gaji::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('gaji.index');
    }
}
