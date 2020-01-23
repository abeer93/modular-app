<?php

namespace App\Modules\Article\Services;

use App\Modules\Article\Models\Article;

/**
 * Class ArticleService
 * @package App\Modules\Article\Services
 * @author Abeer Elhout<abeer.elhout@gmail.com>
 */
class ArticleService
{
    /**
     * @var Article $model instance of article model
     */
    protected $model;

    /**
     * ArticleService constructor.
     *
     * @param Article $article instance of article model
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    /**
     * Filter articles
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function filterArticles($filters = [])
    {
        $this->model = $this->model->newQuery();

        if(!empty($filters)) {
            foreach($filters as $filter => $value) {
                $this->model->where($filter, 'like', '%' . $value . '%');
            }
        }

        return $this->model->orderBy('id', 'desc')->get();
    }
}
