<?php

namespace App\Http\Controllers;
use App\Models\Gaji;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $gaji = Gaji::get();
        return view('admin.gaji.laporan', compact('gaji'));
    }

    public function laporan(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $article = Article::whereBetween('tanggal', [$start, $end])
            ->get();
        // dd($article);
        $pdf = \PDF::loadView('admin.gaji.laporan', ['laporan' => $laporan]);
        return $pdf->download('cetak-gaji.pdf');
    }
}
