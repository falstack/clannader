<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function list(Request $request)
    {
        return $this->postRepository->getPosts($request->all());
    }

    public function show(Request $request)
    {
        $user_id = $this->getUserIdByJWT();

        return $this->postRepository->showPost($request->get('id'), $user_id);
    }
}
