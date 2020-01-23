<?php

namespace App\Modules\Article\database\seeds;

use Illuminate\Database\Seeder;
use App\Modules\Article\Models\Article;

/**
 * Class ArticlesTableSeeder responsible for adding articles in database
 * @package App\Modules\Article\database\seeds
 * @author Abeer Elhout<abeer.elhout@gmail.com>
 */
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 3)->create();
    }
}
