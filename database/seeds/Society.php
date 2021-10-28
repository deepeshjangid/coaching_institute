<?php

use Illuminate\Database\Seeder;

class Society extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('societies')->insert(array(
            array(
            'name' => 'Shalimar',
            'location' => 'Alwar',
            'flats' => '20',
            'towers' => '2', ),
             array(
            'name' => 'Ansal',
            'location' => 'Alwar',
            'flats' => '25',
            'towers' => '5', ),
             array(
            'name' => 'Ansal2',
            'location' => 'Alwar',
            'flats' => '30',
            'towers' => '50', )
        
        ));
    }
}
