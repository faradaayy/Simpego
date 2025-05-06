<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id_peg'); // Primary key
            $table->string('nip')->unique(); // NIP
            $table->string('nama'); // Nama Pegawai
            $table->string('t_lahir')->nullable(); // Tempat Lahir
            $table->date('tgl_lahir')->nullable(); // Tanggal Lahir
            $table->enum('jns_kelamin', ['L', 'P']); // Jenis Kelamin
            $table->string('agama')->nullable(); // Agama
            $table->enum('sts_marital', ['Menikah', 'Belum menikah'])->nullable(); // Status Perkawinan
            $table->enum('sts_pegawai', ['CPNS', 'PNS', 'CPPPK', 'PPPK']); // Status Kepegawaian
            $table->enum('sts_aktif', ['Aktif', 'Pensiun', 'Diberhentikan'])->nullable(); // Status Aktif
            $table->string('no_wa')->nullable(); // No WA
            $table->string('email')->nullable(); // Email
            $table->string('foto')->nullable(); // Foto
            $table->string('no_karpeg')->nullable(); // No Karpeg
            $table->string('no_karis_karsu')->nullable(); // No Karis/Karsu
            $table->string('no_kpe')->nullable(); // No KPE
            $table->string('no_taspen')->nullable(); // No Taspen
            $table->string('nuptk')->nullable(); // NUPTK
            $table->string('nrg')->nullable(); // NRG
            $table->string('nik')->nullable(); // NIK
            $table->string('npwp')->nullable(); // NPWP
            $table->string('no_rek_bank')->nullable(); // No Rek Bank
            $table->string('nama_bank')->nullable(); // Nama Bank
            $table->string('alamat_rumah')->nullable(); // Alamat Rumah
            
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
