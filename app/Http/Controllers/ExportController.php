<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Ekspor data pegawai ke dalam file Excel.
     */
    public function export()
    {
        // Membuat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header ke kolom-kolom dalam file Excel
        $sheet->setCellValue('A1', 'NIP');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Tempat Lahir');
        $sheet->setCellValue('E1', 'Tanggal Lahir');
        $sheet->setCellValue('F1', 'Jenis Kelamin');
        $sheet->setCellValue('G1', 'Agama');
        $sheet->setCellValue('H1', 'Status Marital');
        $sheet->setCellValue('I1', 'Status Pegawai');
        $sheet->setCellValue('J1', 'No WA');
        $sheet->setCellValue('K1', 'Foto');
        $sheet->setCellValue('L1', 'No Karpeg');
        $sheet->setCellValue('M1', 'No Karis/Karsu');
        $sheet->setCellValue('N1', 'No KPE');
        $sheet->setCellValue('O1', 'No Taspen');
        $sheet->setCellValue('P1', 'NUPTK');
        $sheet->setCellValue('Q1', 'NRG');
        $sheet->setCellValue('R1', 'NIK');
        $sheet->setCellValue('S1', 'NPWP');
        $sheet->setCellValue('T1', 'No Rek Bank');
        $sheet->setCellValue('U1', 'Nama Bank');
        $sheet->setCellValue('V1', 'Alamat Rumah');
        $sheet->setCellValue('W1', 'Status Aktif');

        // Mengambil semua data pegawai
        $pegawais = Pegawai::all();
        $row = 2; // Baris pertama untuk data

        // Memasukkan data pegawai ke dalam file Excel
        foreach ($pegawais as $pegawai) {
            $sheet->setCellValue('A' . $row, $pegawai->nip);
            $sheet->setCellValue('B' . $row, $pegawai->nama);
            $sheet->setCellValue('C' . $row, $pegawai->email);
            $sheet->setCellValue('D' . $row, $pegawai->t_lahir);
            $sheet->setCellValue('E' . $row, $pegawai->tgl_lahir);
            $sheet->setCellValue('F' . $row, $pegawai->jns_kelamin);
            $sheet->setCellValue('G' . $row, $pegawai->agama);
            $sheet->setCellValue('H' . $row, $pegawai->sts_marital);
            $sheet->setCellValue('I' . $row, $pegawai->sts_pegawai);
            $sheet->setCellValue('J' . $row, $pegawai->no_wa);
            $sheet->setCellValue('K' . $row, $pegawai->foto ? asset('storage/' . $pegawai->foto) : 'Tidak Ada');
            $sheet->setCellValue('L' . $row, $pegawai->no_karpeg);
            $sheet->setCellValue('M' . $row, $pegawai->no_karis_karsu);
            $sheet->setCellValue('N' . $row, $pegawai->no_kpe);
            $sheet->setCellValue('O' . $row, $pegawai->no_taspen);
            $sheet->setCellValue('P' . $row, $pegawai->nuptk);
            $sheet->setCellValue('Q' . $row, $pegawai->nrg);
            $sheet->setCellValue('R' . $row, $pegawai->nik);
            $sheet->setCellValue('S' . $row, $pegawai->npwp);
            $sheet->setCellValue('T' . $row, $pegawai->no_rek_bank);
            $sheet->setCellValue('U' . $row, $pegawai->nama_bank);
            $sheet->setCellValue('V' . $row, $pegawai->alamat_rumah);
            $sheet->setCellValue('W' . $row, $pegawai->sts_aktif);
            $row++;
        }

        // Membuat writer untuk menyimpan file dalam format Excel (.xlsx)
        $writer = new Xlsx($spreadsheet);

        // Nama file yang akan di-download
        $fileName = 'data-pegawai.xlsx';

        // Menyiapkan response header untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Tulis file ke output
        $writer->save('php://output');
        exit;
    }
}
