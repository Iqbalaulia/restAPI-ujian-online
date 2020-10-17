<?php

use App\Pengaturan;
use App\Soal;
use App\User;
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
        factory(User::class,20)->create();
        factory(Soal::class,20)->create();
        factory(Pengaturan::class,20)->create();

    }
}
