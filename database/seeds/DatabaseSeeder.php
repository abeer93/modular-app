<?php

use Illuminate\Database\Seeder;
use App\Modules\Article\database\seeds\ArticlesTableSeeder;

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
        $this->call(ArticlesTableSeeder::class);
    }
}
