<?php

use Illuminate\Database\Seeder;

class CategotySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'cat1',],
            ['id' => 2, 'name' => 'cat2',],
            ['id' => 3, 'name' => 'cat3',],
            ['id' => 4, 'name' => 'cat4',],
            ['id' => 5, 'name' => 'cat5',],
            ['id' => 6, 'name' => 'cat6',],
            ['id' => 7, 'name' => 'cat7',],
            ['id' => 8, 'name' => 'cat8',],
            ['id' => 9, 'name' => 'cat9',],
            ['id' => 10, 'name' => 'cat10',],

        ];

        foreach ($items as $item) {
            \App\Category::create($item);
        }
    }
}
