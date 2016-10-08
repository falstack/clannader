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

    public function all(Request $request)
    {
        return $this->postRepository->getPosts($request->get('offset'), $request->get('take'));
    }

    public function show(Request $request)
    {
        $user_id = $this->getUserIdByJWT();

        return $this->postRepository->showPost($request->get('id'), $user_id);
    }
}
