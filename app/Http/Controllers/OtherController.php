<?php

namespace App\Http\Controllers;

use App\Clannader\Repository\OtherRepository;
use zgldh\QiniuStorage\QiniuStorage;


class OtherController extends Controller
{
    protected $otherRepository;

    public function __construct(OtherRepository $otherRepository)
    {
        $this->otherRepository = $otherRepository;
    }

    public function backgroundShow()
    {
        return $this->otherRepository->backgroundShow();
    }

    public function uptoken()
    {
        $disk = QiniuStorage::disk('qiniu');
        $token = $disk->uploadToken();
        return response()->json(['uptoken' => $token], 200);
    }
}
