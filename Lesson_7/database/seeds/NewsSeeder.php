<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 20)),
                'text' => $faker->realText(rand(1000, 2000)),
                'is_private' => false,
                'category_id' => $faker->numberBetween(1,4)
            ];
        }



        return $data;
    }
}
