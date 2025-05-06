@extends('layouts.induk')

@section('konten')
<div class="container mt-5">
    <h2 class="mb-4">Employee Information Form</h2>
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6 mb-3">
                <label for="nip" class="form-label">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Pegawai:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="t_lahir" class="form-label">Tempat Lahir:</label>
                <input type="text" class="form-control" id="t_lahir" name="t_lahir" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_wa" class="form-label">No WA:</label>
                <input type="text" class="form-control" id="no_wa" name="no_wa">
            </div>
            <div class="col-md-6 mb-3">
                <label for="jns_kelamin" class="form-label">Jenis Kelamin:</label>
                <select class="form-select w-100 rounded" id="jns_kelamin" name="jns_kelamin" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;;">   
                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option> <!-- Placeholder -->
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select class="form-select w-100 rounded" id="agama" name="agama" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                <option value="" disabled selected hidden>Pilih Agama</option> <!-- Placeholder -->
                    <option value="Hindu">Hindu</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="sts_marital" class="form-label">Status Perkawinan:</label>
                <select class="form-select w-100 rounded" id="sts_marital" name="sts_marital" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="" disabled selected hidden>Pilih Status Perkawinan</option> <!-- Placeholder -->
                    <option value="Menikah">Menikah</option>
                    <option value="Belum menikah">Belum Menikah</option>
                    <option value="Cerai">Cerai</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="sts_pegawai" class="form-label">Status Kepegawaian:</label>
                <select class="form-select w-100 rounded" id="sts_pegawai" name="sts_pegawai" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="" disabled selected hidden>Pilih Status Kepegawaian</option> <!-- Placeholder -->
                    <option value="CPNS">CPNS</option>
                    <option value="PNS">PNS</option>
                    <option value="CPPPK">CPPPK</option>
                    <option value="PPPK">PPPK</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_karpeg" class="form-label">No Karpeg:</label>
                <input type="text" class="form-control" id="no_karpeg" name="no_karpeg">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_karis_karsu" class="form-label">No Karis/Karsu:</label>
                <input type="text" class="form-control" id="no_karis_karsu" name="no_karis_karsu">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_kpe" class="form-label">No KPE:</label>
                <input type="text" class="form-control" id="no_kpe" name="no_kpe">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_taspen" class="form-label">No Taspen:</label>
                <input type="text" class="form-control" id="no_taspen" name="no_taspen">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nuptk" class="form-label">NUPTK:</label>
                <input type="text" class="form-control" id="nuptk" name="nuptk">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nrg" class="form-label">NRG:</label>
                <input type="text" class="form-control" id="nrg" name="nrg">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="npwp" class="form-label">NPWP:</label>
                <input type="text" class="form-control" id="npwp" name="npwp">
            </div>
            <div class="col-md-6 mb-3">
                <label for="sts_aktif" class="form-label">Status Aktif :</label>
                <select class="form-select w-100 rounded" id="sts_aktif" name="sts_aktif" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="" disabled selected hidden>Pilih Status Aktif</option> <!-- Placeholder -->
                    <option value="Aktif">Aktif</option>
                    <option value="Pensiun">Pensiun</option>
                    <option value="Diberhentikan">Diberhentikan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama_bank" class="form-label">Nama Bank:</label>
                <input type="text" class="form-control" id="nama_bank" name="nama_bank">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_rek_bank" class="form-label">No Rek Bank:</label>
                <input type="text" class="form-control" id="no_rek_bank" name="no_rek_bank">
            </div>  
            <div class="col-12">
                <label for="alamat_rumah" class="form-label">Alamat Rumah:</label>
                <textarea class="form-control" id="alamat_rumah" name="alamat_rumah" rows="3"></textarea>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
