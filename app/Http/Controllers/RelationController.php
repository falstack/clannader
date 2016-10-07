<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\CommentRepository;
use App\Clannader\Repository\LikeRepository;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    protected $commentRepository;
    protected $likeRepository;

    public function __construct(CommentRepository $commentRepository,
                                LikeRepository $likeRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->likeRepository = $likeRepository;
    }

    public function list(Request $request)
    {
        return $this->commentRepository->getCommentList($request->get('id'), $request->get('type'), $this->getUserIdByJWT());
    }

    public function store(Request $request)
    {
        $user = $this->getAuthUser();

        return $this->commentRepository->commentStore($request->all(), $user);
    }

    public function agree(Request $request)
    {
        $user = $this->getAuthUser();

        $this->likeRepository->agree($request->get('id'), $request->get('type'), $user);
    }

    public function replyStore(Request $request)
    {
        $user = $this->getAuthUser();

        return $this->commentRepository->commentReplyStore($request->all(), $user);
    }
}
