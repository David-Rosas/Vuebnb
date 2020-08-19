<?php

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $file = file_get_contents(storage_path('data.json'));
      $data = json_decode($file, true);
      DB::table('listings')->insert($data);
    }
}
