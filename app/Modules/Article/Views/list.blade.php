@extends('Article::layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="container-fluid">
            <form method="get" action="{{ route('articles.index') }}">
                <div class="row">
                    <div class="col">
                        <input name="content" type="text" class="form-control" placeholder="Search in content">
                    </div>
                    <div class="col">
                        <input name="title" type="text" class="form-control" placeholder="Search in title">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <br />

        <div class="container-fluid">
            @foreach($articles->toArray() as $article)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>{{$article['title']}}</h1>
                        </div>
                        <div class="col-md-4">
                            <a class="btn btn-success" href="{{ route('articles.edit', ['article' => $article['id']]) }}">Edit</a>
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-article_id="{{ $article['id'] }}"
                                data-toggle="modal"
                                data-target="#deleteArticleModal{{$article['id']}}"
                            >
                                Delete
                            </button>
                            @include('Article::delete-article-modal', ['article_id' => $article['id']])
                        </div>
                    </div>
                    <p>{{$article['content']}}</p>
                    <img src="{{ asset($article['image']) }}" style="width:350px; height:150px">
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@stop
