@extends('layouts.app')

@section('content')
    <div class="post-list">
        <h2>Post List</h2>
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('posts.index', $post->id) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('post.create.form') }}" class="btn btn-primary">Create Post</a>
    </div>
@endsection
