<?php

use Illuminate\Database\Seeder;
use Ranium\SeedOnce\Traits\SeedOnce;

class DatabaseSeeder extends Seeder
{
	use SeedOnce;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Society::class);
        $this->call(Banner::class);
		\Artisan::call('seedonce:mark-seeded');
    }
}
