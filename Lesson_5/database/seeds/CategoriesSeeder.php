<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    private $categories = [
        '1' => ['id' => 1, 'title' => 'Экономика', 'url' => 'economika'],
        '2' => ['id' => 2, 'title' => 'Политика', 'url' => 'politika'],
        '3' => ['id' => 3, 'title' => 'Спорт', 'url' => 'sport'],
        '4' => ['id' => 4, 'title' => 'Наука', 'url' => 'nauka'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->categories);
    }
}
