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
        $path = public_path('tbl_regions.sql');
        
        $mysqlBin = 'C:\xampp\mysql\bin';
        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];

        echo "Import SQL from sql file ".$path."\n";
        exec("$mysqlBin\mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $path");
        echo "Import SQL Success!\n\n";
    }
}
