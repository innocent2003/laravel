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

     private $lastHash = "0000000000000000000000000000000000000000000000000000000000000";
     public function run()
     {
         $faker = Faker::create();
         for ($i = 0; $i < 10; $i++) {
             $data = Data::create([
                 "idProduct" => $faker->uuid,
                 "user_id"=>$faker->randomNumber(1,10),
                 "dataname" => $faker->name,
                 "video" => $faker->url,
                 "image" => $faker->imageUrl(),
                 "description" => $faker->sentence,
                //  'is_active' => $this->faker->randomElement(['active', 'inactive'])
             ]);

             // Kiểm tra nếu có idProduct trùng nhau
             $existingMedia = Media::where('hash_idProduct', hash('sha256', $data->idProduct))->first();

             if ($existingMedia) {
                 // Tính toán nonce và tạo dữ liệu cho bảng Media với hash kết hợp giữa idProduct, nonce và prev_idProductHash
                 $nonce = 0;
                 $combinedHash = '';
                 do {
                     $nonce++;
                     $combinedHash = hash('sha256', $data->idProduct . $nonce . $existingMedia->prev_idProductHash);
                 } while (substr($combinedHash, 0, 4) !== "0000");

                 $media = Media::create([
                     "hash_idProduct" => $combinedHash,
                     "prev_idProductHash" => $existingMedia->hash_idProduct,
                     "nonce" => $nonce,
                 ]);
             } else {
                 // Tính toán nonce và tạo dữ liệu cho bảng Media
                 $nonce = 0;
                 $combinedHash = '';
                 do {
                     $nonce++;
                     $combinedHash = hash('sha256', $data->idProduct . $nonce);
                 } while (substr($combinedHash, 0, 4) !== "0000");

                 $media = Media::create([
                     "hash_idProduct" => $combinedHash,
                     "prev_idProductHash" => $this->lastHash,
                     "nonce" => $nonce,
                 ]);
                 $this->lastHash = $combinedHash;
             }
         }
     }

}
