<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Contracts\View\View;

class DisplayController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
    }

    /**
     * @return View
     * @throws \Exception
     */
    public function showPostList(): View
    {
        $posts = $this->postService->getAll();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * @param $post_id
     * @return View
     */
    public function showPost($post_id): View
    {
        //TODO:: refactor in services & repositories
        $post = Post::findOrFail($post_id);
        $categories = Category::all();
        $tags = Tag::all();
        if(!$post && $categories && $tags){
            abort(404);
        }

        return view('posts.show', ['categories' => $categories, 'post' => $post, 'tags' => $tags,]);
    }

    /**
     * @return View
     */
    public function showPostCreateForm(): View
    {
        //TODO:: refactor in services & repositories
        $categories = Category::all();
        $tags = Tag::all();
        if(!$categories && $tags){
            abort(404);
        }

        return view('posts.create', ['categories' => $categories, 'tags' => $tags,]);
    }

    /**
     * @param int $post
     * @return View
     */
    public function showPostEditForm(int $post): View
    {
        //TODO:: refactor in services & repositories
        $post = Post::findOrFail($post);
        if(!$post){
            abort(404);
        }
        return view('posts.edit', ['categories'=> Category::all(), 'post'=> $post]);
    }
}
