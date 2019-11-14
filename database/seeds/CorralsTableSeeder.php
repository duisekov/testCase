<?php

use Illuminate\Database\Seeder;

class CorralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            factory(App\Corral::class)->create([
                'name' => "Загон {$i}",
            ]);
        }
    }
}
