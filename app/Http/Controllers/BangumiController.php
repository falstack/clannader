<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\BangumiRepository;
use Illuminate\Http\Request;

class BangumiController extends Controller
{
    protected $bangumiRepository;

    public function __construct(BangumiRepository $bangumiRepository)
    {
        $this->bangumiRepository = $bangumiRepository;
    }

    public function info(Request $request)
    {
        return $this->bangumiRepository->getBangumiInfo($request->get('id'), $this->getUserIdByJWT());
    }

    public function list(Request $request)
    {
        return $this->bangumiRepository->getBangumiList($request->all(), $this->getUserIdByJWT());
    }
}
