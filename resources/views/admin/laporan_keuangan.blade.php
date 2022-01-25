@extends('admin.template')

@section('title', 'Laporan Keuangan Manual')

@section('content')
<h3 class="w-75 text-center m-auto">
    LAPORAN REALISASI PELAKSANAAN ANGGARAN PENDAPATAN DAN BELANJA DESA PEMERINTAH DESA {{ strtoupper($desa->nama) }} <br/>
    TAHUN ANGGARAN 2022
</h3>

<div style="overflow-x: auto">
	<table class="table table-secondary table-stripped mt-5" style="table-layout: fixed">
        <colgroup>
            <col span="1" style="width: 8rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
            <col span="1" style="width: 4rem">
        </colgroup>
        
	    <thead>
	        <tr>
	            <th>Uraian</th>
	            <th>Anggaran (Rp)</th>
	            <th>Realisasi (Rp)</th>
	            <th>Lebih/Kurang (Rp)</th>
	            <th>Persentase (%)</th>
	        </tr>
	    </thead>
	    <tbody>
            <tr>
                <td colspan="5"><strong>4.PENDAPATAN</strong></td>
            </tr>
            <tr>
                <td>4.1. Pendapatan Asli Desa</td>
                <td>{{ number_format($dataPendapatan['anggaran']['4.1'], 2, ',', '.') }}</td>
                <td>{{ number_format($dataPendapatan['realisasi']['4.1'], 2, ',', '.') }}</td>
                <td>{{ number_format(abs($dataPendapatan['anggaran']['4.1'] - ($dataPendapatan['realisasi']['4.1'])), 2, ',', '.') }}</td>
                <td>{{ number_format($dataPendapatan['realisasi']['4.1'] * 100 / $dataPendapatan['anggaran']['4.1'], 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>4.2. Pendapatan Transfer</td>
                <td>{{ number_format($dataPendapatan['anggaran']['4.2'], 2, ',', '.') }}</td>
                <td>{{ number_format($dataPendapatan['realisasi']['4.2'], 2, ',', '.') }}</td>
                <td>{{ number_format(abs($dataPendapatan['anggaran']['4.2'] - ($dataPendapatan['realisasi']['4.2'])), 2, ',', '.') }}</td>
                <td>{{ number_format($dataPendapatan['realisasi']['4.2'] * 100 / $dataPendapatan['anggaran']['4.2'], 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>4.3. Pendapatan Lain-lain</td>
                <td>{{ number_format($dataPendapatan['anggaran']['4.3'], 2, ',', '.') }}</td>
                <td>{{ number_format($dataPendapatan['realisasi']['4.3'], 2, ',', '.') }}</td>
                <td>{{ number_format(abs($dataPendapatan['anggaran']['4.3'] - ($dataPendapatan['realisasi']['4.3'])), 2, ',', '.') }}</td>
                <td>{{ number_format($dataPendapatan['realisasi']['4.3'] * 100 / $dataPendapatan['anggaran']['4.3'], 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="text-center bg-warning"><strong>JUMLAH PENDAPATAN</strong></td>
                <td class="bg-warning">{{ number_format($dataPendapatan['anggaran']['total'], 2, ',', '.') }}</td>
                <td class="bg-warning">{{ number_format($dataPendapatan['realisasi']['total'], 2, ',', '.') }}</td>
                <td class="bg-warning">{{ number_format(abs($dataPendapatan['anggaran']['total'] - ($dataPendapatan['realisasi']['total'])), 2, ',', '.') }}</td>
                <td class="bg-warning">{{ number_format($dataPendapatan['realisasi']['total'] * 100 / $dataPendapatan['anggaran']['total'], 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>5.BELANJA</strong></td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td class="text-center bg-warning"><strong>SURPLUS/(DEFISIT)</strong></td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
            </tr>
            <tr>
                <td colspan="5"><strong>6.PEMBIAYAAN</strong></td>
            </tr>
            <tr>
                <td>6.1. Penerimaan Pembiayaan</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6.2. Pengeluaran Pembiayaan</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td class="text-center bg-warning"><strong>PEMBIAYAAN NETTO</strong></td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
            </tr>
            <tr>
                <td class="text-center bg-warning"><strong>SILPA/SiLPA TAHUN BERJALAN</strong></td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
                <td class="bg-warning">0</td>
            </tr>
	    </tbody>
	</table>
</div>
@endsection