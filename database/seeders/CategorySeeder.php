<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'comic'],
            ['name' => 'novel'],
            ['name' => 'fantasy'],
            ['name' => 'fiction'],
            ['name' => 'mistery'],
            ['name' => 'horor'],
            ['name' => 'romance'],
            ['name' => 'western'],
        ];

        foreach ($data as $item) {
            Category::insert([
                'name' => $item['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
