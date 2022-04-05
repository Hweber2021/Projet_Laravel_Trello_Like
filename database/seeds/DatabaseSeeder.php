<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Workplace::class, 10)->create()->each(function ($workplace) {
            $i = rand(2, 8);
            while (--$i) {
                $workplace->dashboards()->save(factory(App\Dashboard::class)->make());
            }
        });
    }
}
