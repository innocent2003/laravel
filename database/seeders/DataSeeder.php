<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Data;
use App\Models\Media;
use Faker\Factory as Faker;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $data = Data::create([
                "idProduct" => $faker->uuid,
                "name" => $faker->name,
                "video" => $faker->url,
                "image" => $faker->imageUrl(),
                "description" => $faker->sentence,
            ]);

            // Tính toán nonce và tạo dữ liệu cho bảng Media
            $nonce = 0;
            $combinedHash = '';
            do {
                $nonce++;
                $combinedHash = hash('sha256', $data->idProduct . $nonce);
            } while (substr($combinedHash, 0, 4) !== "0000");

            $media = Media::create([
                "hash_idProduct" => hash('sha256', $data->idProduct . $nonce),
                "prev_idProductHash" => "",
                "nonce" => $nonce,
            ]);
        }
    }
}
