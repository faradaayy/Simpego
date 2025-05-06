@extends('layouts.induk')

@section('konten')
<div class="container mt-5">
    <h1 class="mb-4">Detail Pegawai</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- Kolom Foto dan Status Aktif -->
                <div class="col-md-4 mb-3">
                    @if ($pegawai->foto)
                        <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Pegawai" class="img-fluid rounded" style="margin-left: 50px;">
                    @else
                        <p class="text-muted">Tidak ada foto</p>
                    @endif
                <!-- Informasi Identitas diletakkan di bawah foto -->
                <div class="mt-3" style="margin-left: 50px;">
                        <p><strong>NIK :</strong> {{ $pegawai->nik }}</p>
                        <p><strong>NPWP :</strong> {{ $pegawai->npwp }}</p>
                    </div>
                    <!-- Status Aktif diletakkan di bawah foto -->
                    <div class="mt-3" style="margin-left: 50px;">
                        <strong style="font-size: 14px;">Status Aktif :</strong> 
                            <span class="badge {{ $pegawai->sts_aktif == 'Aktif' ? 'bg-success' : ($pegawai->sts_aktif == 'Pensiun' ? 'bg-warning' : 'bg-danger') }}" style="font-size: 14px;">
                                {{ $pegawai->sts_aktif }}
                            </span>
                        </p>
                    </div>
                </div>
                <!-- Kolom Informasi Pribadi dan Kepegawaian -->
                <div class="col-md-7">
                    <div class="row">
                        <!-- Bagian Kiri -->
                        <div class="col-md-6 mb-3">
                            <h4>Informasi Pribadi</h4>
                            <p><strong>NIP :</strong> {{ $pegawai->nip }}</p>
                            <p><strong>Nama :</strong> {{ $pegawai->nama }}</p>
                            <p><strong>Email :</strong> {{ $pegawai->email }}</p>
                            <p><strong>Agama :</strong> {{ $pegawai->agama }}</p>
                            <p><strong>Tempat Lahir :</strong> {{ $pegawai->t_lahir }}</p>
                            <p><strong>Tanggal Lahir :</strong> {{ \Carbon\Carbon::parse($pegawai->tgl_lahir)->format('d-m-Y') }}</p>
                            <p><strong>Jenis Kelamin :</strong> {{ $pegawai->jns_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            <p><strong>Status Perkawinan :</strong> {{ $pegawai->sts_marital }}</p>
                        </div>

                        <!-- Bagian Kanan -->
                        <div class="col-md-6 mb-3">
                            <h4>Informasi Kepegawaian</h4>
                            <p><strong>Status Kepegawaian :</strong> {{ $pegawai->sts_pegawai }}</p>
                            <p><strong>No WA :</strong> {{ $pegawai->no_wa }}</p>
                            <p><strong>No Karpeg :</strong> {{ $pegawai->no_karpeg }}</p>
                            <p><strong>No Karis/Karsu :</strong> {{ $pegawai->no_karis_karsu }}</p>
                            <p><strong>No KPE :</strong> {{ $pegawai->no_kpe }}</p>
                            <p><strong>No Taspen :</strong> {{ $pegawai->no_taspen }}</p>
                            <p><strong>NUPTK :</strong> {{ $pegawai->nuptk }}</p>
                            <p><strong>NRG :</strong> {{ $pegawai->nrg }}</p>
                        </div>
                    </div>
                    <!-- Alamat dan Informasi Bank -->
                    <div class="row mt-4">
                        <!-- Alamat di sebelah kiri -->
                        <div class="col-md-6 mb-3">
                            <h5>Alamat</h5>
                            <p>{{ $pegawai->alamat_rumah }}</p>
                        </div>

                        <!-- Informasi Bank di sebelah kanan -->
                        <div class="col-md-6 mb-3">
                            <h5>Informasi Bank</h5>
                            <p><strong>Nama Bank :</strong> {{ $pegawai->nama_bank }}</p>
                            <p><strong>No Rek Bank :</strong> {{ $pegawai->no_rek_bank }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('pegawai.edit', $pegawai->id_peg) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection