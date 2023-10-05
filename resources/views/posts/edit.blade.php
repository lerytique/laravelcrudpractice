@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать пост</h1>

        <!-- Форма для редактирования поста -->
        <form action="{{ route('update.post', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Контент</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_url">URL изображения</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $post->image_url }}" required>
            </div>
            <div class="form-group">
                <label for="category">Категория</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Тэги</label>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Сохранить изменения</button>
        </form>
    </div>
@endsection
