<?php

namespace Database\Seeders;

use App\Models\EventOne;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventOne::factory()
            ->count(88)
            ->create();


    }
}
