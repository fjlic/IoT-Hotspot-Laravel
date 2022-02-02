<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class AddFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Part Name : SED
     * * Part Size : 5.1
     * @return void
     */
    public function run()
    {
        //
        $file = new File();
        $file->id = 1;
        $file->name_file = "nintendo.mp4";
        $file->set = 'demo';
        $file->route = public_path("storage/public/files/nintendo.mp4");
        $file->save();

        $file = new File();
        $file->id = 2;
        $file->name_file = "psp.mp4";
        $file->set = 'demo';
        $file->route = public_path("storage/public/files/psp.mp4");
        $file->save(); 

        $file = new File();
        $file->id = 3;
        $file->name_file = "xbox.mp4";
        $file->set = 'demo';
        $file->route = public_path("storage/public/files/xbox.mp4");
        $file->save();

        $file = new File();
        $file->id = 4;
        $file->name_file = "windows.mp4";
        $file->set = 'demo';
        $file->route = public_path("storage/public/files/windows.mp4");
        $file->save();

        $file = new File();
        $file->id = 5;
        $file->name_file = "apple.mp4";
        $file->set = 'demo';
        $file->route = public_path("storage/public/files/apple.mp4");
        $file->save();
    }
}
