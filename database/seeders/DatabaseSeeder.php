<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Desa;
use App\Models\Sensus;
use App\Models\AnggotaKeluarga;
use App\Models\Dusun;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$now = date('Y-m-d');

		// Admin Desa
		User::create([
			'id_desa' => 1,
			'name' => 'admin_desa1',
			'password' => bcrypt('admin123desa1')
		]);
		User::create([
			'id_desa' => 2,
			'name' => 'admin_desa2',
			'password' => bcrypt('admin123desa2')
		]);

		// Desa
		Desa::create([
			'nama' => 'Desa 1',
			'kode_pos' => '52212',
			'nik_kepala' => '3302231510050002',
			'alamat_kantor' => 'Jl. Consectetur',
			'email' => 'desa1@desa.id',
			'no_telp' => '088245678940',
			'website' => 'https://desasatu.desa.id',
			'nama_kecamatan' => 'Kecamatan 1',
			'kode_kecamatan' => 32,
			'nama_camat' => 'Adipiscing Elit',
			'nama_kabupaten' => 'Kabupaten 1',
			'kode_kabupaten' => 42,
			'nama_provinsi' => 'Provinsi 1',
			'kode_provinsi' => 52
		]);
		Desa::create([
			'nama' => 'Desa 2',
			'kode_pos' => '52318',
			'nik_kepala' => '3302231010070002',
			'alamat_kantor' => 'Jl. Adipiscing Elit',
			'email' => 'desa2@desa.id',
			'no_telp' => '088245678940',
			'website' => 'https://desadua.desa.id',
			'nama_kecamatan' => 'Kecamatan 1',
			'kode_kecamatan' => 32,
			'nama_camat' => 'Adipiscing Elit',
			'nama_kabupaten' => 'Kabupaten 1',
			'kode_kabupaten' => 42,
			'nama_provinsi' => 'Provinsi 1',
			'kode_provinsi' => 52
		]);

		// Dusun di desa 1
	    Dusun::create([
			'id_desa' => 1,
	        'nama' => 'Consectetur',
	        'kepala_dusun' => '3302231510050002',
			'jumlah_rw' => 8,
			'jumlah_rt' => 24,
			'jumlah_kk' => 35,
			'jumlah_lp' => 210,
			'jumlah_l' => 100,
			'jumlah_p' => 110
	    ]);
	    Dusun::create([
			'id_desa' => 2,
	        'nama' => 'Adipiscing',
	        'kepala_dusun' => '3302231010070002',
			'jumlah_rw' => 6,
			'jumlah_rt' => 18,
			'jumlah_kk' => 25,
			'jumlah_lp' => 150,
			'jumlah_l' => 60,
			'jumlah_p' => 90
	    ]);

		// Kepala desa 1
	    Sensus::create([
			'id_desa' => 1,
	        'status_dasar' => 'HIDUP',
	        'nama' => 'Lorem Ipsum',
	        'nik' => '3302231510050002',
	        'jenis_kelamin' => 'L',
	        'agama' => 'Islam',
	        'status_penduduk' => 'TETAP',
	        'ttl' => 'Consectetur, 2005-10-15',
	        'umur' => 28,
	        'pendidikan_ditempuh' => 'SEDANG S-3/SEDERAJAT',
	        'pekerjaan' => 'Programmer',
	        'no_telp' => '088328179781',
	        'alamat_email' => 'loremipsum67@lipsum.com',
	        'alamat' => 'Jl. Consectetur',
	        'dusun' => 'Consectetur',
	        'tanggal_terdaftar' => $now
	    ]);
		AnggotaKeluarga::create([
			'id_desa' => 1,
			'nik_anggota' => '3302231510050002',
			'no_kk' => '3302231510300002',
	        'no_kk_sebelumnya' => '3302231510300002',
	        'hubungan_keluarga' => 'KEPALA KELUARGA',
	        'anak_ke' => 1,
	        'pendidikan' => 'SLTA/SEDERAJAT',
	        'nik_ayah' => '0',
	        'nik_ibu' => '0',
	        'status_kawin' => 'KAWIN',
	        'tanggal_perkawinan' => '2030-10-15'
		]);
		// Kepala desa 2
	    Sensus::create([
			'id_desa' => 2,
	        'status_dasar' => 'HIDUP',
	        'nama' => 'Dolor Sit Amet',
	        'nik' => '3302231010070002',
	        'jenis_kelamin' => 'L',
	        'agama' => 'Islam',
	        'status_penduduk' => 'TETAP',
	        'ttl' => 'Consectetur, 2007-10-10',
	        'umur' => 26,
	        'pendidikan_ditempuh' => 'SEDANG S-2/SEDERAJAT',
	        'pekerjaan' => 'Programmer',
	        'no_telp' => '088324894361',
	        'alamat_email' => 'dolorsitamet81@lipsum.com',
	        'alamat' => 'Jl. Adipiscing Elit',
	        'dusun' => 'Adipiscing',
	        'tanggal_terdaftar' => $now
	    ]);
		AnggotaKeluarga::create([
			'id_desa' => 2,
			'nik_anggota' => '3302231010070002',
			'no_kk' => '3302231010350002',
	        'no_kk_sebelumnya' => '3302231010350002',
	        'hubungan_keluarga' => 'KEPALA KELUARGA',
	        'anak_ke' => 1,
	        'pendidikan' => 'SLTA/SEDERAJAT',
	        'nik_ayah' => '0',
	        'nik_ibu' => '0',
	        'status_kawin' => 'KAWIN',
	        'tanggal_perkawinan' => '2035-10-10'
		]);

		// Penduduk desa 1
	    Sensus::create([
			'id_desa' => 1,
	        'status_dasar' => 'HIDUP',
	        'nama' => 'Aliquam Nulla',
	        'nik' => '3302235012050002',
	        'jenis_kelamin' => 'P',
	        'agama' => 'Islam',
	        'status_penduduk' => 'TETAP',
	        'ttl' => 'Consectetur, 2005-12-10',
	        'umur' => 28,
	        'pendidikan_ditempuh' => 'SEDANG S-3/SEDERAJAT',
	        'pekerjaan' => 'Programmer',
	        'no_telp' => '088218124781',
	        'alamat_email' => 'aliquam32@lipsum.com',
	        'alamat' => 'Jl. Consectetur',
	        'dusun' => 'Consectetur',
	        'tanggal_terdaftar' => $now
	    ]);
		AnggotaKeluarga::create([
			'id_desa' => 1,
			'nik_anggota' => '3302235012050002',
			'no_kk' => '3302231510300002',
	        'no_kk_sebelumnya' => '3302231510300002',
	        'hubungan_keluarga' => 'ISTRI',
	        'anak_ke' => 1,
	        'pendidikan' => 'SLTA/SEDERAJAT',
	        'nik_ayah' => '0',
	        'nik_ibu' => '0',
	        'status_kawin' => 'KAWIN',
	        'tanggal_perkawinan' => '2030-10-15'
		]);
		// Penduduk desa 2
	    Sensus::create([
			'id_desa' => 2,
	        'status_dasar' => 'HIDUP',
	        'nama' => 'Aperiam Soluta',
	        'nik' => '3302234512070002',
	        'jenis_kelamin' => 'P',
	        'agama' => 'Islam',
	        'status_penduduk' => 'TETAP',
	        'ttl' => 'Consectetur, 2007-12-05',
	        'umur' => 26,
	        'pendidikan_ditempuh' => 'SEDANG S-2/SEDERAJAT',
	        'pekerjaan' => 'Programmer',
	        'no_telp' => '028121824331',
	        'alamat_email' => 'solutaap28@lipsum.com',
	        'alamat' => 'Jl. Adipiscing Elit',
	        'dusun' => 'Adipiscing',
	        'tanggal_terdaftar' => $now
	    ]);
		AnggotaKeluarga::create([
			'id_desa' => 2,
			'nik_anggota' => '3302234512070002',
			'no_kk' => '3302231010350002',
	        'no_kk_sebelumnya' => '3302231010350002',
	        'hubungan_keluarga' => 'ISTRI',
	        'anak_ke' => 1,
	        'pendidikan' => 'SLTA/SEDERAJAT',
	        'nik_ayah' => '0',
	        'nik_ibu' => '0',
	        'status_kawin' => 'KAWIN',
	        'tanggal_perkawinan' => '2035-10-10'
		]);
    }
}
