<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $lk = Pegawai::where('jns_kelamin', 'L')->count(); // Menghitung jumlah laki-laki
        $pr = Pegawai::where('jns_kelamin', 'P')->count(); // Menghitung jumlah perempuan
        $total_user = User::count(); // Menghitung total user
        $total_pegawai = Pegawai::count(); // Menghitung total pegawai
    
        // Example data for chart (adjust according to actual attributes available)
        $pegawai = Pegawai::all(); // Retrieve all Pegawai instances
    
        return view('dashboard', [
            'lk' => $lk,
            'pr' => $pr,
            'total_user' => $total_user,
            'total_pegawai' => $total_pegawai,
            'pegawai' => $pegawai,
        ]);
    }     
}

