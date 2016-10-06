<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\PostRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function news(Request $request)
    {
        return $this->postRepository->getPostListByNews($request->get('offset'), $request->get('take'));
    }
}
