<?php

use Illuminate\Database\Seeder;

class AlumitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Project_alumital_type::class, 10)->create();
    }
}
