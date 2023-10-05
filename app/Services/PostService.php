<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Exception;

/**
 * service for post crud
 */
readonly class PostService
{
    /**
     * @param PostRepository $postRepository
     */
    public function __construct(private PostRepository $postRepository)
    {
    }

    /**
     * @param int $perPage
     * @param int $currentPage
     * @return mixed
     */
    public function paginate(int $perPage, int $currentPage): mixed
    {
        return $this->postRepository->paginate($perPage, $currentPage);
    }

    /**
     * @param array $data
     * @return Post
     */
    public function create(array $data): Post
    {
        return $this->postRepository->create($data);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function find(int $id): mixed
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            throw new \Exception("Model post with id $id not found");
        }
        return $post;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public function update(int $id, array $data): bool
    {
        $post = $this->find($id);
        return $this->postRepository->update($post, $data);
    }

    /**
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete(int $id): ?bool
    {
        $post = $this->find($id);
        return $this->postRepository->delete($post);
    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getAll(): Collection
    {
        return $this->postRepository->all();
    }
}
