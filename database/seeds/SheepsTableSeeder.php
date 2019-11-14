<?php

use Illuminate\Database\Seeder;

class SheepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            factory(App\Sheep::class)->create([
                'name' => "Овечка {$i}"
        ]);
        }
    }
}
