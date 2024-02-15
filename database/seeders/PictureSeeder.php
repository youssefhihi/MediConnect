<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;

class PictureSeeder extends Seeder
{
    public function run()
    {
        // // Get the file path of the picture
        // $filePath = 'public/imgs/profile.jpg'; // Adjust the path to your picture file

        // // Store the picture record in the database
        // Picture::create([
        //     'url' => $filePath,
        //     'pictureable_id' => 1, // Adjust the pictureable_id as needed
        //     'pictureable_type' => 'App\Models\User', // Adjust the pictureable_type as needed
        // ]);
    }
}

