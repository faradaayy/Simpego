<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $lk = Pegawai::where('jns_kelamin', 'L')->count();
        $pr = Pegawai::where('jns_kelamin', 'P')->count();
        $menikah = Pegawai::where('sts_marital', 'Menikah')->count();
        $bmenikah = Pegawai::where('sts_marital', 'Belum menikah')->count();

        return view('grafik', [
            'lk' => $lk,
            'pr' => $pr,
            'menikah' => $menikah,
            'bmenikah' => $bmenikah
        ]);
    }

    // Other methods...
}