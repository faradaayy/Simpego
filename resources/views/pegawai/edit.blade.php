@extends('layouts.induk')

@section('konten')
<div class="container mt-5">
    <h2 class="mb-4">Edit Employee Information</h2>
    <form action="{{ route('pegawai.update', $pegawai->id_peg) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6 mb-3">
                <label for="nip" class="form-label">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $pegawai->nip) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Pegawai:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pegawai->nama) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pegawai->email) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="t_lahir" class="form-label">Tempat Lahir:</label>
                <input type="text" class="form-control" id="t_lahir" name="t_lahir" value="{{ old('t_lahir', $pegawai->t_lahir) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $pegawai->tgl_lahir->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_wa" class="form-label">No WA:</label>
                <input type="text" class="form-control" id="no_wa" name="no_wa" value="{{ old('no_wa', $pegawai->no_wa) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="jns_kelamin" class="form-label">Jenis Kelamin:</label>
                <select class="form-select w-100 rounded" id="jns_kelamin" name="jns_kelamin" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="L" {{ old('jns_kelamin', $pegawai->jns_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jns_kelamin', $pegawai->jns_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select class="form-select w-100 rounded" id="agama" name="agama" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="Hindu" {{ old('agama', $pegawai->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Islam" {{ old('agama', $pegawai->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $pegawai->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $pegawai->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Budha" {{ old('agama', $pegawai->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama', $pegawai->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="sts_marital" class="form-label">Status Perkawinan:</label>
                <select class="form-select w-100 rounded" id="sts_marital" name="sts_marital" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="Menikah" {{ old('sts_marital', $pegawai->sts_marital) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Belum Menikah" {{ old('sts_marital', $pegawai->sts_marital) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Cerai" {{ old('sts_marital', $pegawai->sts_marital) == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="sts_pegawai" class="form-label">Status Kepegawaian:</label>
                <select class="form-select w-100 rounded" id="sts_pegawai" name="sts_pegawai" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="CPNS" {{ old('sts_pegawai', $pegawai->sts_pegawai) == 'CPNS' ? 'selected' : '' }}>CPNS</option>
                    <option value="PNS" {{ old('sts_pegawai', $pegawai->sts_pegawai) == 'PNS' ? 'selected' : '' }}>PNS</option>
                    <option value="CPPPK" {{ old('sts_pegawai', $pegawai->sts_pegawai) == 'CPPPK' ? 'selected' : '' }}>CPPPK</option>
                    <option value="PPPK" {{ old('sts_pegawai', $pegawai->sts_pegawai) == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @if ($pegawai->foto)
                    <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Current Photo" class="mt-2 img-thumbnail" style="max-width: 200px;">
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_karpeg" class="form-label">No Karpeg:</label>
                <input type="text" class="form-control" id="no_karpeg" name="no_karpeg" value="{{ old('no_karpeg', $pegawai->no_karpeg) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_karis_karsu" class="form-label">No Karis/Karsu:</label>
                <input type="text" class="form-control" id="no_karis_karsu" name="no_karis_karsu" value="{{ old('no_karis_karsu', $pegawai->no_karis_karsu) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_kpe" class="form-label">No KPE:</label>
                <input type="text" class="form-control" id="no_kpe" name="no_kpe" value="{{ old('no_kpe', $pegawai->no_kpe) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_taspen" class="form-label">No Taspen:</label>
                <input type="text" class="form-control" id="no_taspen" name="no_taspen" value="{{ old('no_taspen', $pegawai->no_taspen) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nuptk" class="form-label">NUPTK:</label>
                <input type="text" class="form-control" id="nuptk" name="nuptk" value="{{ old('nuptk', $pegawai->nuptk) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nrg" class="form-label">NRG:</label>
                <input type="text" class="form-control" id="nrg" name="nrg" value="{{ old('nrg', $pegawai->nrg) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $pegawai->nik) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="npwp" class="form-label">NPWP:</label>
                <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp', $pegawai->npwp) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="sts_aktif" class="form-label">Status Aktif:</label>
                <select class="form-select w-100 rounded" id="sts_aktif" name="sts_aktif" required style="height: 40px; font-size: 14px; border-color: #dfdfdf;">
                    <option value="Aktif" {{ old('sts_aktif', $pegawai->sts_aktif) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Pensiun" {{ old('sts_aktif', $pegawai->sts_aktif) == 'Pensiun' ? 'selected' : '' }}>Pensiun</option>
                    <option value="Diberhentikan" {{ old('sts_aktif', $pegawai->sts_aktif) == 'Diberhentikan' ? 'selected' : '' }}>Diberhentikan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama_bank" class="form-label">Nama Bank:</label>
                <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="{{ old('nama_bank', $pegawai->nama_bank) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_rek_bank" class="form-label">No Rek Bank:</label>
                <input type="text" class="form-control" id="no_rek_bank" name="no_rek_bank" value="{{ old('no_rek_bank', $pegawai->no_rek_bank) }}">
            </div>
            <div class="col-12">
                <label for="alamat_rumah" class="form-label">Alamat Rumah:</label>
                <textarea class="form-control" id="alamat_rumah" name="alamat_rumah" rows="3">{{ old('alamat_rumah', $pegawai->alamat_rumah) }}</textarea>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
