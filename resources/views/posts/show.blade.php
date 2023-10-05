@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <img src="{{ $post->image_url }}" alt="Post Image">
        <p>Categories: {{ implode(', ', $post->categories->pluck('name')->toArray()) }}</p>
        <p>Tags: {{ implode(', ', $post->tags->pluck('name')->toArray()) }}</p>

        <!-- Кнопки -->
        <div class="mt-3">
            <a href="{{ route('post.create.form') }}" class="btn btn-primary">Создать пост</a>
            <a href="{{ route('posts.edit.form', $post->id) }}" class="btn btn-success">Изменить текущий пост</a>
            <a href="{{ route('posts.show') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
@endsection
