<?php

use Illuminate\Database\Seeder;

class PortfolioTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Portfolio_type::class, 10)->create();
    }
}
