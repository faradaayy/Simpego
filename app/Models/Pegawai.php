<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_peg';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        't_lahir',
        'tgl_lahir',
        'jns_kelamin',
        'agama',
        'sts_marital',
        'sts_pegawai',
        'no_wa',
        'foto',
        'no_karpeg',
        'no_karis_karsu',
        'no_kpe',
        'no_taspen',
        'nuptk',
        'nrg',
        'nik',
        'npwp',
        'no_rek_bank',
        'nama_bank',
        'alamat_rumah',
        'sts_aktif',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];
}