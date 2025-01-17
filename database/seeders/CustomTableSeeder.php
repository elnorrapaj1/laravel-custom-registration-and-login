<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomTable;

class CustomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomTable::create(['column1' => 'Value 1', 'column2' => 'Value 2', 'column3' => 'Value 3']);
        CustomTable::create(['column1' => 'Value 4', 'column2' => 'Value 5', 'column3' => 'Value 6']);
    }
}
