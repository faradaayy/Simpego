<?php

namespace App\Http\Controllers;


use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all(); // Fetch all pegawai records
        return view('pegawai.index', compact('pegawais')); // Pass data to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create'); // Return the create view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|unique:pegawai',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            't_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jns_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:255',
            'sts_marital' => 'required|string|max:255',
            'sts_pegawai' => 'required|in:CPNS,PNS,CPPPK,PPPK',
            'no_wa' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_karpeg' => 'nullable|string|max:255',
            'no_karis_karsu' => 'nullable|string|max:255',
            'no_kpe' => 'nullable|string|max:255',
            'no_taspen' => 'nullable|string|max:255',
            'nuptk' => 'nullable|string|max:255',
            'nrg' => 'nullable|string|max:255',
            'nik' => 'required|string|max:255',
            'npwp' => 'nullable|string|max:255',
            'no_rek_bank' => 'nullable|string|max:255',
            'nama_bank' => 'nullable|string|max:255',
            'alamat_rumah' => 'nullable|string|max:500',
            'sts_aktif' => 'required|in:Aktif,Pensiun,Diberhentikan',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public');
            $validatedData['foto'] = $path;
        }

        Pegawai::create($validatedData);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id_peg
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peg)
    {
        $pegawai = Pegawai::findOrFail($id_peg);
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_peg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peg)
    {
        $pegawai = Pegawai::findOrFail($id_peg);

        $validatedData = $request->validate([
            'nip' => 'required|unique:pegawai,nip,' . $id_peg . ',id_peg',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            't_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jns_kelamin' => 'required|in:L,P',
            'agama' => 'required|string|max:255',
            'sts_marital' => 'required|string|max:255',
            'sts_pegawai' => 'required|in:CPNS,PNS,CPPPK,PPPK',
            'no_wa' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_karpeg' => 'nullable|string|max:255',
            'no_karis_karsu' => 'nullable|string|max:255',
            'no_kpe' => 'nullable|string|max:255',
            'no_taspen' => 'nullable|string|max:255',
            'nuptk' => 'nullable|string|max:255',
            'nrg' => 'nullable|string|max:255',
            'nik' => 'required|string|max:255',
            'npwp' => 'nullable|string|max:255',
            'no_rek_bank' => 'nullable|string|max:255',
            'nama_bank' => 'nullable|string|max:255',
            'alamat_rumah' => 'nullable|string|max:500',
            'sts_aktif' => 'required|in:Aktif,Pensiun,Diberhentikan',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($pegawai->foto) {
                Storage::disk('public')->delete($pegawai->foto);
            }
            $path = $request->file('foto')->store('foto', 'public');
            $validatedData['foto'] = $path;
        }

        $pegawai->update($validatedData);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id); // Find the employee or fail
        return view('pegawai.show', compact('pegawai')); // Pass the employee data to the view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete(); // Delete the employee record

        return redirect()->route('pegawai.index')->with('success', 'Employee deleted successfully.');
    }

}    