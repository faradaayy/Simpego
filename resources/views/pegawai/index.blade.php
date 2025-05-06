@extends('layouts.induk')

@section('konten')
<div class="container-fluid">
    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br/>
            @endforeach
        </div>
    @endif

    <!-- Page Title and Add Button -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Pegawai</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> Tambah
            </a>
            <a href="{{ route('pegawai.export') }}" class="btn mb-3" style="background-color: green; color: white;">
                <i class="fa fa-table"></i> Cetak
            </a>
            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" width="100%" cellspacing="0">
                    <thead>
                        <tr role="row">
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>JK</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                            <tr role="row" class="odd">
                                <td>
                                    <img src="{{ asset('storage/' . $pegawai->foto) }}" width="100px" alt="Foto {{ $pegawai->nama }}">
                                </td>
                                <td>{{ $pegawai->nip }}</td>
                                <td>{{ $pegawai->nama }}</td>
                                <td>{{ $pegawai->t_lahir }}, {{ \Carbon\Carbon::parse($pegawai->tgl_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $pegawai->jns_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $pegawai->no_wa }}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{ route('pegawai.show', $pegawai->id_peg) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pegawai.edit', $pegawai->id_peg) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <!-- Button to trigger delete operation -->
                                    <form action="{{ route('pegawai.destroy', $pegawai->id_peg) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-1">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            {{-- <!-- Modal Edit Pegawai -->
                            @include('modals.edit-pegawai', ['pegawai' => $pegawai]) --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
