<?php

namespace App\Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Modules\Article\Models
 * @author Abeer Elhout<abeer.elhout@gmail.com>
 */
class Article extends Model
{
    /**
     * @var string $table database table name
     */
    protected $table = 'articles';

    /**
     * @var array
     */
    protected $fillable = ['title', 'content', 'image'];
}
