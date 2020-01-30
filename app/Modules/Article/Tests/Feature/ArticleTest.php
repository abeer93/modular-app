<?php

namespace App\Modules\Article\Tests\Feature;

use App\Modules\Article\Models\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testListArticlesWillReturnAllDataSuccessfully()
    {
        // add articles to database
        $articles = [];
        for ($count = 0; $count < 3; $count++)
        {
            $articles[] = factory(Article::class)->create();
        }

        $response = $this->get('/articles');
        $response->status(200);
        $response->assertViewIs('Article::list');
        $response->assertViewHas('articles');
        $response->assertSee($articles[0]->title);
        $response->assertSee($articles[0]->content);
    }

    public function testAddArticleWillStoreArticleInDatabaseSuccessfully()
    {
        $faker = Faker::create();
        $article = [
            'title'   => $faker->sentence,
            'content' => $faker->paragraph
        ];
        $response = $this->post('/articles', $article, []);
        $response->status(200);
        $response->assertRedirect(route('articles.index'));
        $this->assertDatabaseHas('articles', [
            'title'   => $article['title'],
            'content' => $article['content']
        ]);
    }

    public function testUpdateArticleWillEditArticleInDatabaseSuccessfully()
    {
        $article = factory(Article::class)->create();
        $updatedArticleData = [
            'title'   => 'Sapiente quis consectetur magnam',
            'content' => $article->content
        ];
        $response = $this->put('articles/' . $article->id, $updatedArticleData, []);
        $response->status(200);
        $response->assertRedirect(route('articles.index'));
        $this->assertDatabaseHas('articles', [
            'id'     => $article->id,
            'title'   => $updatedArticleData['title'],
            'content' => $article->content
        ]);
    }

    public function testDeleteArticleWillDeleteArticleFromDatabaseSuccessfully()
    {
        $article = factory(Article::class)->create();
        $response = $this->delete('articles/' . $article->id);
        $response->status(200);
        $response->assertRedirect(route('articles.index'));
        $this->assertDatabaseMissing('articles', [
            'id'     => $article->id,
            'title'   => $article->title,
            'content' => $article->content
        ]);
    }
}
