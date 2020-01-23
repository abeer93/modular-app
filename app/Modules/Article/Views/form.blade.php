@extends('Article::layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <h1>{{isset($article) ? 'Edit' : 'New'}} Article</h1>
        <div class="container-fluid">
            @if(isset($article))
                <form method="post" action="{{route('articles.update', ['article' => $article->id]) }}" enctype="multipart/form-data">
                    {{ method_field('PUT')}}
            @else
                <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @endif
                    <div class="form-group">
                        @csrf
                        <label for="name">Title:</label>
                        <input required type="text" class="form-control" name="title" value="@if(isset($article)) {{$article->title}} @endif"/>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Content :</label>
                        <textarea required class="form-control" name="content">@if(isset($article)) {{$article->content}} @endif</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Image :</label>
                        <input type="file" class="form-control" name="image" />
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br />
                        @if(isset($article))
                            <img src="{{ asset($article->image) }}" style="width:350px; height:150px">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
