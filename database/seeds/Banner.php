<?php

use Illuminate\Database\Seeder;

class Banner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert(array(
			array(
				'image' => '63010331.jpg',
				'sort_order' => '2',
				),
             array(
            'image' => '63010331.jpg',
				'sort_order' => '1', ),
             array(
            'image' => '63010331.jpg',
			'sort_order' => '3', )
		));
    }
}
