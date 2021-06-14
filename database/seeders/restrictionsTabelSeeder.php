<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restrictions;

class restrictionsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restrictions::create(['minSaleCountForWholesaler'=>1]);
    }
}
