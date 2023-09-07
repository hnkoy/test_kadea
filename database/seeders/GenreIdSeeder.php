<?php

namespace Database\Seeders;

use App\Models\GenreId;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GenreId::factory(300)->create();
    }
}
