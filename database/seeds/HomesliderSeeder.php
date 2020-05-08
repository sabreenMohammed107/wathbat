<?php

use Illuminate\Database\Seeder;

class HomesliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * to run make command php artisan db:seed --class=HomesliderSeeder
     * @return void
     */
    public function run()
    {
        // $this->call(HomesliderSeeder::class);
        factory(App\Models\Home_slider::class, 10)->create();
    }
}
