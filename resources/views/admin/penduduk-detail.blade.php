@extends('admin.template')

@section('title', 'Detail Penduduk | ' . $penduduk->nama)

@section('content')
<h2 class="text-center">{{ $penduduk->nama }}</h2>

<table width="100%" class="mt-5 detail">
    <tr>
        <td width="30%">STATUS DASAR</td>
        <td>: {{ $penduduk->status_dasar }}</td>
    </tr>
    <tr>
        <td width="30%">NAMA LENGKAP</td>
        <td>: {{ $penduduk->nama }}</td>
    </tr>
    <tr>
        <td width="30%">NO. KARTU KELUARGA</td>
        <td>: {{ $penduduk->no_kk }}</td>
    </tr>
    <tr>
        <td width="30%">NO. KARTU KELUARGA SEBELUMNYA</td>
        <td>: {{ $penduduk->no_kk_sebelumnya }}</td>
    </tr>
    <tr>
        <td width="30%">HUBUNGAN DALAM KELUARGA</td>
        <td>: {{ $penduduk->hubungan_keluarga }}</td>
    </tr>
    <tr>
        <td width="30%">JENIS KELAMIN</td>
        <td>: {{ $penduduk->jenis_kelamin }}</td>
    </tr>
    <tr>
        <td width="30%">AGAMA</td>
        <td>: {{ $penduduk->agama }}</td>
    </tr>
    <tr>
        <td width="30%">STATUS PENDUDUK</td>
        <td>: {{ $penduduk->status_penduduk }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>DATA KELAHIRAN</strong></td>
    </tr>
    <tr>
        <td width="30%">TEMPAT/TANGGAL LAHIR</td>
        <td>: {{ $penduduk->ttl }}</td>
    </tr>
    <tr>
        <td width="30%">KELAHIRAN ANAK KE</td>
        <td>: {{ $penduduk->anak_ke }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>PENDIDIKAN DAN PEKERJAAN</strong></td>
    </tr>
    <tr>
        <td width="30%">PENDIDIKAN DALAM KK</td>
        <td>: {{ $penduduk->pendidikan_kk }}</td>
    </tr>
    <tr>
        <td width="30%">PENDIDIKAN YANG SEDANG DITEMPUH</td>
        <td>: {{ $penduduk->pendidikan_ditempuh }}</td>
    </tr>
    <tr>
        <td width="30%">PEKERJAAN</td>
        <td>: {{ $penduduk->pekerjaan }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>ORANG TUA</strong></td>
    </tr>
    <tr>
        <td width="30%">NIK AYAH</td>
        <td>: {{ $penduduk->nik_ayah }}</td>
    </tr>
    <tr>
        <td width="30%">NIK IBU</td>
        <td>: {{ $penduduk->nik_ibu }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>ALAMAT</strong></td>
    </tr>
    <tr>
        <td width="30%">NOMOR TELEPON</td>
        <td>: {{ $penduduk->no_telp }}</td>
    </tr>
    <tr>
        <td width="30%">ALAMAT EMAIL</td>
        <td>: {{ $penduduk->alamat_email }}</td>
    </tr>
    <tr>
        <td width="30%">ALAMAT</td>
        <td>: {{ $penduduk->alamat }}</td>
    </tr>
    <tr>
        <td width="30%">DUSUN</td>
        <td>: {{ $penduduk->dusun }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>DATA PERKAWINAN</strong></td>
    </tr>
    <tr>
        <td width="30%">STATUS KAWIN</td>
        <td>: {{ $penduduk->status_kawin }}</td>
    </tr>
    <tr>
        <td width="30%">TANGGAL PERKAWINAN</td>
        <td>: {{ $penduduk->tanggal_perkawinan }}</td>
    </tr>
    <tr style="background-color: #DEDEDE">
        <td colspan="2"><strong>PROGRAM BANTUAN</strong></td>
    </tr>
    @foreach ($bantuan as $bant)
    <tr>
        <td>{{ $bant->nama_program }}</td>
        <td>{{ $bant->keterangan }}</td>
    </tr>
    @endforeach
</table>
@endsection