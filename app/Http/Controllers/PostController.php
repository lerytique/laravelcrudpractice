<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    public function __construct(private readonly PostService $postService, private readonly PostRequest $postRequest)
    {
    }


    public function getPosts(Request $request): JsonResponse
    {
        //Получает значение параметра  per_page  из запроса. Если параметр не задан, по умолчанию 10.
        $perPage = $request->per_page ? $request->per_page : 10;
        //Получает значение параметра  current_page  из запроса. Если параметр не задан, устанавливает значение по умолчанию равным 1.
        $currentPage = $request->current_page ? $request->current_page : 1;
        //Вызывает метод  paginate  сервиса  PostService , передавая количество элементов на странице и текущую страницу для пагинации.
        $posts = $this->postService->paginate($perPage, $currentPage);
        //Возвращает ответ в формате JSON с пагинированными постами.
        return response()->json($posts);
    }

    /**
     * @throws ValidationException
     */
    //Метод createPost - создание нового ресурса, принимает объект  Request  и возвращает объект  JsonResponse .
    public function createPost(Request $request): JsonResponse
    {
        //Создает экземпляр класса  Validator , используя метод  make  фасада  Validator , который принимает все данные
        // из запроса и правила валидации из конструктора класов
        $validator = Validator::make($request->all(), $this->postRequest->rulesForCreate());
        //Проверяет, прошла ли валидация. Если валидация не прошла, возвращает ответ с ошибками в формате JSON.
        if ($validator->fails()) {
            return response()->json(["data" => [
                "success" => false,
                "errors" => $validator->errors()
            ]]);
        }
        //Получает валидированные данные из объекта  Validator
        $data = $validator->validated();

        //Вызывает метод  create  сервиса  PostService , передавая валидированные данные для создания поста.
        $this->postService->create($data);

        //Возвращает ответ в формате JSON с подтверждением успешного создания поста.
        return response()->json(["data" => [
            "success" => true
        ]]);
    }


    /**
     * @throws ValidationException
     */
    //Определяет публичный метод  update , который принимает объект  Request  и идентификатор поста,
    //и возвращает объект  JsonResponse
    public function updatePost(Request $request, int $id): JsonResponse
    {
        //Создает экземпляр класса  Validator , используя метод  make  фасада  Validator,
        //который принимает все данные из запроса и правила валидации из конструктора классов
        $validator = Validator::make($request->all(), $this->postRequest->rulesForUpdate());
        // Проверяет, прошла ли валидация. Если валидация не прошла,
        // возвращает ответ с ошибками в формате JSON.
        if ($validator->fails()) {
            return response()->json(["data" => [
                "success" => false,
                "errors" => $validator->errors()
            ]]);
        }
        //Получает валидированные данные из объекта  Validator
        $data = $validator->validated();
        //Вызывает метод  update  сервиса  PostService ,
        //передавая идентификатор поста и валидированные данные для обновления поста.
        $this->postService->update($id, $data);

        //Возвращает ответ в формате JSON с подтверждением успешного обновления поста.
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    /**
     * @param int $id
     * @return JsonResponse|RedirectResponse
     * @throws \Exception
     */
    //Определяет публичный метод  destroy , который принимает идентификатор поста
    //и возвращает объект  JsonResponse
    public function destroyPost(int $id): JsonResponse|RedirectResponse
    {
        // Вызывает метод delete сервиса PostService, передавая ему идентификатор поста для удаления.
        $this->postService->delete($id);

        return response()->json(["data" => [
            "message" => 'Post deleted successful'
        ]]);
    }
}
