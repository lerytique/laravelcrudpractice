<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class PostRepository
{
    /**
     * @param int $perPage
     * @param int $currentPage
     * @return mixed
     */
    public function paginate(int $perPage, int $currentPage): mixed
    {
        return Post::paginate($perPage, ['*'], 'page', $currentPage);
    }

    /**
     * @param array $data
     * @return Post
     */
    public function create(array $data): Post
    {
        $post = new Post();
        $post->fill($data);
        $post->save();

        return $post;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id): mixed
    {
        return Post::findOrFail($id);
    }

    /**
     * @param Post $post
     * @param array $data
     * @return bool
     */
    public function update(Post $post, array $data): bool
    {
        return $post->update($data);
    }

    /**
     * @param Post $post
     * @return bool|null
     */
    public function delete(Post $post): ?bool
    {
        return $post->delete();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Post::all();
    }
}
