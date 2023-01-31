<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\enums\NewsStatus;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData():array
    {
        for($i=0; $i < 4; $i++){
            $data=[
                'title'=> \fake()->jobtitle(),
                'description' => \fake()->text(100),
                'autohor' => \fake()->userName(),
                'status' => NewsStatus::DRAFT->value,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
