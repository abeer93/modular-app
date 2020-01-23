<?php

namespace App\Modules\Article\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Article\Http\Requests\ArticleRequest;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Services\ArticleService;
use Illuminate\Http\Request;
use File;

/**
 * Class ArticleController responsible for article requests and responses
 * @package App\Modules\Article\Http\Controllers
 * @author Abeer Elhout<abeer.elhout@gmail.com>
 */
class ArticleController extends Controller
{
    /**
     * @var ArticleService $articleService instance of article service
     */
    protected $articleService;

    /**
     * ArticleController constructor.
     *
     * @param ArticleService $articleService instance of article service
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * List all article or filter it depend on title and description
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articles = $this->articleService->filterArticles($request->all());

        return view('Article::list')->with('articles', $articles);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Article::form');
    }

    /**
     * Add new article
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();

        // check image is sent and upload it
        if ($request->file('image')) {
            $data['image'] = $this->saveArticleImages($request->file('image'));
        }

        Article::create($data);
        return redirect('articles')->with('success','Article successfully created.');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('Article::form')->with('article', $article);
    }

    /**
     * Update article data
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->all();

        // check image is sent and upload it
        if ($request->file('image')) {
            $data['image'] = $this->saveArticleImages($request->file('image'));
        }

        $article->update($data);
        return redirect('articles')->with('success','Article successfully updated.');
    }

    /**
     * Delete article
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('articles')->with('success','Article successfully deleted.');
    }

    /**
     * Save articles images
     *
     * @param File $image
     * @return string
     */
    private function saveArticleImages($image)
    {
        // car articles images folder path
        $articleFolderPath = 'uploads/articles/';

        // check if directory created if not create it
        if(!File::isDirectory($articleFolderPath)) {
            File::makeDirectory($articleFolderPath, 0777, true, true);
        }

        // save image
        $articleImg = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($articleFolderPath, $articleImg);

        return $articleFolderPath . $articleImg;
    }
}
