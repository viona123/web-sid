<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportRegions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path1 = public_path('tbl_regions.sql');
        $path2 = public_path('tbl_regions_bps.sql');
        $sqlfile1 = DB::unprepared(file_get_contents($path1));
        $sqlfile2 = DB::unprepared(file_get_contents($path2));

        $mysqlBin = 'C:\xampp\mysql\bin';
        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];

        \Log::info('Import SQL from sql file '.$path1.'');
        exec("$mysqlBin\mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sqlfile1");
        \Log::info('Import SQL Success!');

        \Log::info('Import SQL from sql file '.$path1.'');
        exec("$mysqlBin\mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sqlfile2");
        \Log::info('Import SQL Success!');
    }
}
