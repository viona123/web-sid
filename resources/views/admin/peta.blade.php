@extends('admin.template')

@section('title', 'Peta Desa ' . $desa->nama)

@section('content')
<h1 class="text-center mb-4">Peta {{ $desa->nama }}</h1><hr>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63301.06337841211!2d109.19940387805663!3d-7.430189415694508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c3136423d1d%3A0x4027a76e352e4a0!2sPurwokerto%2C%20Kabupaten%20Banyumas%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1641538869990!5m2!1sid!2sid" width="100%" height="450" style="border:0;" loading="lazy" class="mt-4"></iframe>
@endsection